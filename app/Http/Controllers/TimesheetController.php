<?php

namespace App\Http\Controllers;

use App\Mail\TimesheetApprovedMail;
use App\Mail\TimesheetRejectedMail;
use App\Mail\TimesheetSubmittedMail;
use App\Models\Attendance;
use App\Models\Project;
use App\Models\Task;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TimesheetReportExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class TimesheetController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view timesheet', only: ['index']),
            new Middleware('permission:edit timesheet', only: ['edit']),
            new Middleware('permission:create timesheet', only: ['create']),
        ];
    }
    public function create($projectId, Task $task)
    {
        $userId = Auth::id();
        $today = now()->toDateString();
        $punch = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->latest()
            ->first();
        $hoursWorked = null;
        if ($punch && $punch->punch_out) {
            $rawHours = (strtotime($punch->punch_out) - strtotime($punch->punch_in)) / 3600;
            $hoursWorked = number_format($rawHours, 2, '.', '');
        }
        return view('timesheets.create', compact('task', 'projectId', 'hoursWorked', 'today'))->with('attendance', $punch);
    }
    public function index($projectId, Task $task)
    {
        $timesheets = Timesheet::where('task_id', $task->id)->with('user')->get();
        return view('timesheets.index', compact('task', 'projectId', 'timesheets'));
    }

    public function store(Request $request, $projectId, Task $task)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'description' => 'nullable|string',
            'status' => 'nullable|in:Submitted,Approved,Rejected',
        ]);
        $timesheet = Timesheet::create([
            'user_id' => Auth::id(),
            'task_id' => $task->id,
            'date' => $data['date'],
            'hours_worked' => $data['hours_worked'],
            'description' => $data['description'] ?? null,
            'status' => $data['status'] ?? 'Submitted',
        ]);
        $timesheet->load(['user', 'task.project']);
        $admin = User::role('Superadmin')->first();
        $user = Auth::user();
        $ccEmail = optional($user->teamLead)->email ?? null;

        if ($admin) {
            $mailer = Mail::to($admin->email);
            if (!empty($ccEmail)) {
                $mailer->cc($ccEmail);
            }
            $mailer->send(new TimesheetSubmittedMail($timesheet, $admin));
        }
        return redirect()
            ->route('tasks.timesheets.index', [$projectId, $task->id])
            ->with('success', 'Timesheet submitted successfully.');
    }
    public function edit($projectId, Task $task, Timesheet $timesheet)
    {
        if (Auth::id() !== $timesheet->user_id && !Auth::user()->hasRole('Admin')) {
            return redirect()->back()->with('error', 'Unauthorized to edit this timesheet.');
        }
        return view('timesheets.edit', compact('projectId', 'task', 'timesheet'));
    }
    public function update(Request $request, $projectId, Task $task, Timesheet $timesheet)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'description' => 'nullable|string',
            'status' => 'nullable|in:Submitted,Approved,Rejected',
        ]);
        if (Auth::id() !== $timesheet->user_id && !Auth::user()->hasRole('Admin')) {
            return redirect()->back()->with('error', 'Unauthorized to update this timesheet.');
        }
        $validated['status'] = $validated['status'] ?? $timesheet->status;
        try {
            $timesheet->update($validated);
            return redirect()->route('tasks.timesheets.index', [$projectId, $task->id])
                ->with('success', 'Timesheet updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update timesheet: ' . $e->getMessage());
        }
    }
    public function approve(Timesheet $timesheet)
    {
        abort_unless(auth()->user()->can('approve timesheet'), 403);
        $timesheet->update(['status' => 'Approved']);
        $task = $timesheet->task;
        if ($task->hours_assigned !== null) {
            $task->hours_assigned -= $timesheet->hours_worked;
            if ($task->hours_assigned < 0) {
                $task->hours_assigned = 0;
            }
            $task->save();
        }
        $employee = $timesheet->user;
        if ($employee && $employee->email) {
            \Mail::to($employee->email)
                ->send(new TimesheetApprovedMail($timesheet));
        }
        return redirect()->route('tasks.timesheets.index', [
            'project' => $task->project_id,
            'task' => $task->id,
        ])->with('success', 'Timesheet approved and task hours updated.');
    }
    public function reject(Timesheet $timesheet)
    {
        abort_unless(auth()->user()->can('reject timesheet'), 403);
        if ($timesheet->status === 'Approved') {
            $task = $timesheet->task;
            if ($task->hours_assigned !== null) {
                $task->hours_assigned += $timesheet->hours_worked;
                $task->save();
            }
        }
        $timesheet->update(['status' => 'Rejected']);
        $employee = $timesheet->user;
        if ($employee && $employee->email) {
            \Mail::to($employee->email)
                ->send(new TimesheetRejectedMail($timesheet));
        }
        return redirect()->route('tasks.timesheets.index', [
            'project' => $timesheet->task->project_id,
            'task' => $timesheet->task_id
        ])->with('error', 'Timesheet rejected and task hours restored.');
    }
    public function reportForm(Project $project, Task $task)
    {
        return view('timesheets.report_form', compact('project', 'task'));
    }
    public function downloadReport(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date',
            'type' => 'required|in:pdf,excel',
        ]);
        $timesheets = Timesheet::where('project_id', $project->id)
            ->where('task_id', $task->id)
            ->whereBetween('date', [$request->from, $request->to])
            ->with('user')
            ->get();
        if ($timesheets->isEmpty()) {
            return back()->with('error', 'No records found for selected range.');
        }
        if ($request->type === 'excel') {
            $filename = 'timesheet_report.csv';
            $headers = [
                "Content-Type" => "text/csv",
                "Content-Disposition" => "attachment; filename={$filename}",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            ];
            $columns = ['Date', 'User', 'Hours Worked'];
            $callback = function () use ($timesheets, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($timesheets as $sheet) {
                    fputcsv($file, [
                        $sheet->date,
                        $sheet->user->name ?? 'N/A',
                        $sheet->hours_worked,
                    ]);
                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        }
        if ($request->type === 'pdf') {
            $pdf = PDF::loadView('timesheets.report_pdf', [
                'timesheets' => $timesheets,
                'project' => $project,
                'task' => $task,
                'from' => $request->from,
                'to' => $request->to,
            ]);
            return $pdf->download('timesheet_report.pdf');
        }
        return back()->with('error', 'Invalid export type');
    }
}
