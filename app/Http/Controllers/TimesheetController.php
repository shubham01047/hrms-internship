<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Project;
use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TimesheetReportExport;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $validated = $request->validate([
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'description' => 'nullable|string',
            'status' => 'nullable|in:Submitted,Approved,Rejected',
        ]);
        $validated['user_id'] = Auth::id();
        $validated['task_id'] = $task->id;
        $validated['status'] = $validated['status'] ?? 'Submitted';
        try {
            Timesheet::create($validated);
            return redirect()->route('tasks.timesheets.index', [$projectId, $task->id])
                ->with('success', 'Timesheet submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to submit timesheet: ' . $e->getMessage());
        }
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
        return redirect()->route('tasks.timesheets.index', [
            'project' => $timesheet->task->project_id,
            'task' => $timesheet->task_id
        ])->with('success', 'Timesheet approved.');
    }
    public function reject(Timesheet $timesheet)
    {
        abort_unless(auth()->user()->can('reject timesheet'), 403);
        $timesheet->update(['status' => 'Rejected']);
        return redirect()->route('tasks.timesheets.index', [
            'project' => $timesheet->task->project_id,
            'task' => $timesheet->task_id
        ])->with('error', 'Timesheet rejected.');
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
