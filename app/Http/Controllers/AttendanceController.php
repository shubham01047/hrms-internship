<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BreakModel;
use App\Models\Holiday;
use App\Models\Leave;
use App\Models\Project;
use App\Models\ProjectMembers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $today = now()->toDateString();

        $attendance = Attendance::with('breaks')->where('user_id', $user->id)->where('date', $today)->first();
        return view('attendance.index', compact('attendance'));

    }
    public function punchIn(Request $request)
    {
        $request->validate([
            'punch_in_remarks' => 'nullable|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'location_type' => 'required|in:Home,Company',
        ]);
        $user = auth()->user();
        $today = now()->toDateString();
        $attendance = Attendance::firstOrCreate(
            ['user_id' => $user->id, 'date' => $today],
            [
                'punch_in' => now()->format('H:i:s'),
                'punch_in_remarks' => $request->input('punch_in_remarks'),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'location_type' => $request->location_type,
            ]
        );
        return redirect()->back()->with('success', 'Punched in successfully.');
    }
    public function startBreak(Request $request)
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', now())
            ->first();
        if (!$attendance) {
            return redirect()->back()->with('error', 'No active attendance found.');
        }
        $activeBreak = BreakModel::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();
        if ($activeBreak) {
            return redirect()->back()->with('error', 'You already have an active break.');
        }
        $break = BreakModel::create([
            'attendance_id' => $attendance->id,
            'break_type' => $request->break_type,
            'break_start' => now()->format('H:i:s'),
        ]);
        return redirect()->back()->with('success', 'Break started successfully.');
    }
    public function endBreak(Request $request)
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', now())
            ->first();
        if (!$attendance) {
            return back()->with('error', 'Attendance not found.');
        }
        $break = BreakModel::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();
        if (!$break) {
            return back()->with('error', 'No active break.');
        }
        $break->break_end = now()->format('H:i:s');
        $breakStart = Carbon::parse($break->break_start);
        $breakEnd = Carbon::parse($break->break_end);
        $interval = $breakStart->diff($breakEnd);
        $break->total_break_time = $interval->format('%H:%I:%S');
        $break->save();
        return back()->with('success', 'Break ended.');
    }
    public function punchOut(Request $request)
    {
        $request->validate([
            'punch_out_remarks' => 'nullable|string|max:255',
        ]);
        $user = auth()->user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', now())
            ->first();
        if (!$attendance || $attendance->punch_out) {
            return redirect()->back()->with('error', 'Already punched out or not punched in yet.');
        }
        $punchIn = Carbon::parse($attendance->punch_in);
        $punchOut = now();
        $workedDuration = $punchOut->diff($punchIn);
        $totalWorked = sprintf(
            '%02d:%02d:%02d',
            $workedDuration->h,
            $workedDuration->i,
            $workedDuration->s
        );
        $attendance->update([
            'punch_out' => $punchOut,
            'punch_out_remarks' => $request->input('punch_out_remarks'),
            'total_working_hours' => $totalWorked,
        ]);
        return redirect()->back()->with('success', 'Punched out successfully.');
    }
    public function punchInAgain(Request $request)
    {
        $request->validate([
            'punch_in_again_remarks' => 'nullable|string|max:255',
        ]);
        $user = auth()->user();
        $today = now()->toDateString();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', $today)
            ->first();
        if (!$attendance) {
            return redirect()->back()->with('error', 'No attendance found for today. Please punch in first.');
        }
        if (!empty($attendance->punch_in_again) && empty($attendance->punch_out_again)) {
            return redirect()->back()->with('error', 'Already punched in again. Please punch out again before punching in again.');
        }
        $attendance->update([
            'punch_in_again' => now()->format('Y-m-d H:i:s'),
            'punch_in_again_remarks' => $request->input('punch_in_again_remarks'),
            'punch_out_again' => null,
            'punch_out_again_remarks' => null,
        ]);
        return redirect()->back()->with('success', 'Punched in again successfully.');
    }
    public function punchOutAgain(Request $request)
    {
        $request->validate([
            'punch_out_again_remarks' => 'nullable|string|max:255',
        ]);
        $user = auth()->user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', now())
            ->first();
        if (!$attendance || !$attendance->punch_in_again || $attendance->punch_out_again) {
            return redirect()->back()->with('error', 'Not punched in again or already punched out again.');
        }
        $punchInAgain = Carbon::parse($attendance->punch_in_again);
        $punchOutAgain = now();
        $workedDuration = $punchOutAgain->diff($punchInAgain);
        $existingOvertime = '00:00:00';
        if ($attendance->overtime_working_hours) {
            $existingOvertime = $attendance->overtime_working_hours;
        }
        list($hours, $minutes, $seconds) = explode(':', $existingOvertime);
        $existingOvertimeInSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
        $newOvertimeInSeconds = ($workedDuration->h * 3600) + ($workedDuration->i * 60) + $workedDuration->s;
        $totalOvertimeInSeconds = $existingOvertimeInSeconds + $newOvertimeInSeconds;
        $totalHours = floor($totalOvertimeInSeconds / 3600);
        $totalMinutes = floor(($totalOvertimeInSeconds % 3600) / 60);
        $totalSeconds = $totalOvertimeInSeconds % 60;
        $totalOvertime = sprintf(
            '%02d:%02d:%02d',
            $totalHours,
            $totalMinutes,
            $totalSeconds
        );
        $attendance->update([
            'punch_out_again' => $punchOutAgain,
            'punch_out_again_remarks' => $request->input('punch_out_again_remarks'),
            'overtime_working_hours' => $totalOvertime,
        ]);
        return redirect()->back()->with('success', 'Punched out again successfully.');
    }
    public function attendance()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Current week Mon → Sun
        $start = now()->startOfWeek(Carbon::MONDAY);
        $end = now()->endOfWeek(Carbon::SUNDAY);

        // Get attendance for current week
        $attendance = Attendance::where('user_id', $user->id)
            ->whereBetween('date', [$start, $end])
            ->get()
            ->keyBy(fn($att) => Carbon::parse($att->date)->toDateString());

        $data = [];
        $period = new CarbonPeriod($start, $end);

        foreach ($period as $date) {
            $dateStr = $date->toDateString();

            if (isset($attendance[$dateStr]) && $attendance[$dateStr]->total_working_hours > 0) {
                $att = $attendance[$dateStr];
                $status = 1; // Present
                $punch = [
                    'in' => $att->punch_in,
                    'out' => $att->punch_out,
                    'in_again' => $att->punch_in_again ?? null,
                    'out_again' => $att->punch_out_again ?? null,
                ];
                $hours = floatval($att->total_working_hours); // For bar height
            } else {
                $status = 0; // Absent
                $punch = null;
                $hours = 0;
            }

            $data[$dateStr] = [
                'status' => $status,
                'punch' => $punch,
                'hours' => $hours
            ];
        }

        return response()->json($data);
    }

    public function weeklyHolidays()
    {
        $start = \Carbon\Carbon::now()->startOfWeek(\Carbon\Carbon::MONDAY);
        $end = \Carbon\Carbon::now()->endOfWeek(\Carbon\Carbon::SUNDAY);

        $holidays = Holiday::whereBetween('date', [$start, $end])
            ->get()
            ->mapWithKeys(function ($h) {
                return [
                    \Carbon\Carbon::parse($h->date)->format('Y-m-d') => [
                        'title' => $h->title ?? 'Holiday'
                    ]
                ];
            });

        return response()->json($holidays);
    }
    public function weeklyLeaves()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $start = now()->startOfWeek(Carbon::MONDAY);
        $end = now()->endOfWeek(Carbon::SUNDAY);

        $leaves = Leave::where('user_id', $user->id) // only current employee
            ->where('status', 'approved')             // only approved leaves
            ->where(function ($q) use ($start, $end) {
                $q->whereBetween('start_date', [$start, $end])
                    ->orWhereBetween('end_date', [$start, $end]);
            })
            ->with('leaveType') // assuming relation leaveType gives type name
            ->get();

        $data = [];
        $period = new CarbonPeriod($start, $end);

        foreach ($period as $date) {
            $dateStr = $date->toDateString();

            // Check if any leave of this employee covers this date
            $onLeave = $leaves->first(function ($leave) use ($dateStr) {
                $startDate = Carbon::parse($leave->start_date)->toDateString();
                $endDate = Carbon::parse($leave->end_date)->toDateString();
                return $dateStr >= $startDate && $dateStr <= $endDate;
            });

            if ($onLeave) {
                $data[$dateStr] = [
                    'type' => $onLeave->leaveType->name ?? 'Leave', // use relation
                    'reason' => $onLeave->reason,
                ];
            }
        }

        return response()->json($data);
    }



    public function projectsSixMonths()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // 6 months range
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->addMonths(6)->endOfMonth();

        // Projects where user is assigned
        $projects = Project::whereHas('members', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
            ->whereBetween('deadline', [$start, $end])
            ->get(['id', 'title', 'client_name', 'deadline']);

        $data = [];
        foreach ($projects as $project) {
            $dateStr = Carbon::parse($project->deadline)->toDateString();
            $data[$dateStr][] = [
                'title' => $project->title,
                'client_name' => $project->client_name ?? '',
            ];
        }

        return response()->json($data);
    }

    public function tasksMonth()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        // Fetch tasks assigned to the user within current month
        $tasks = Task::whereHas('assignedUsers', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
            ->whereBetween('due_date', [$start, $end])
            ->get();

        $data = [];

        foreach ($tasks as $task) {
            $dueDate = Carbon::parse($task->due_date)->toDateString(); // YYYY-MM-DD
            if (!isset($data[$dueDate])) {
                $data[$dueDate] = [];
            }
            $data[$dueDate][] = [
                'title' => $task->title,
                'project' => $task->project->title ?? 'N/A',
                'priority' => $task->priority,
                'status' => $task->status,
                'hours_assigned' => $task->hours_assigned, // <- fixed
            ];
        }

        return response()->json($data);
    }
}
