<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\BreakModel;
use App\Models\Holiday;
use App\Models\Leave;
use App\Models\Project;
use App\Models\Task;
use Auth;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceApiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $today = now()->toDateString();
        $attendance = Attendance::with('breaks')
            ->where('user_id', $user->id)
            ->where('date', $today)
            ->first();
        return response()->json([
            'success' => true,
            'attendance' => $attendance
        ]);
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
                'punch_in_remarks' => $request->punch_in_remarks,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'location_type' => $request->location_type,
            ]
        );
        return response()->json([
            'success' => true,
            'message' => 'Punched in successfully',
            'attendance' => $attendance
        ]);
    }

    public function startBreak(Request $request)
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', now())
            ->first();
        if (!$attendance) {
            return response()->json(['success' => false, 'message' => 'No active attendance found.'], 404);
        }
        $activeBreak = BreakModel::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();
        if ($activeBreak) {
            return response()->json(['success' => false, 'message' => 'You already have an active break.'], 400);
        }
        $break = BreakModel::create([
            'attendance_id' => $attendance->id,
            'break_type' => $request->break_type,
            'break_start' => now()->format('H:i:s'),
        ]);
        return response()->json(['success' => true, 'message' => 'Break started successfully', 'break' => $break]);
    }
    public function endBreak(Request $request)
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('date', now())
            ->first();
        if (!$attendance) {
            return response()->json(['success' => false, 'message' => 'Attendance not found.'], 404);
        }
        $break = BreakModel::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();
        if (!$break) {
            return response()->json(['success' => false, 'message' => 'No active break.'], 400);
        }
        $break->break_end = now()->format('H:i:s');
        $breakStart = Carbon::parse($break->break_start);
        $breakEnd = Carbon::parse($break->break_end);
        $break->total_break_time = $breakStart->diff($breakEnd)->format('%H:%I:%S');
        $break->save();
        return response()->json(['success' => true, 'message' => 'Break ended.', 'break' => $break]);
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
            return response()->json(['success' => false, 'message' => 'Already punched out or not punched in yet.'], 400);
        }
        $punchIn = Carbon::parse($attendance->punch_in);
        $punchOut = now();
        $workedDuration = $punchOut->diff($punchIn);
        $totalWorked = sprintf('%02d:%02d:%02d', $workedDuration->h, $workedDuration->i, $workedDuration->s);
        $attendance->update([
            'punch_out' => $punchOut,
            'punch_out_remarks' => $request->punch_out_remarks,
            'total_working_hours' => $totalWorked,
        ]);
        return response()->json(['success' => true, 'message' => 'Punched out successfully', 'attendance' => $attendance]);
    }
    public function punchInAgain(Request $request)
    {
        $request->validate([
            'punch_in_again_remarks' => 'nullable|string|max:255',
        ]);
        $user = auth()->user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', now())
            ->first();
        if (!$attendance) {
            return response()->json(['success' => false, 'message' => 'No attendance found for today.'], 404);
        }
        if (!empty($attendance->punch_in_again) && empty($attendance->punch_out_again)) {
            return response()->json(['success' => false, 'message' => 'Already punched in again. Please punch out again before punching in again.'], 400);
        }
        $attendance->update([
            'punch_in_again' => now()->format('Y-m-d H:i:s'),
            'punch_in_again_remarks' => $request->punch_in_again_remarks,
            'punch_out_again' => null,
            'punch_out_again_remarks' => null,
        ]);
        return response()->json(['success' => true, 'message' => 'Punched in again successfully', 'attendance' => $attendance]);
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
            return response()->json(['success' => false, 'message' => 'Not punched in again or already punched out again.'], 400);
        }
        $punchInAgain = Carbon::parse($attendance->punch_in_again);
        $punchOutAgain = now();
        $workedDuration = $punchOutAgain->diff($punchInAgain);
        list($h, $m, $s) = explode(':', $attendance->overtime_working_hours ?? '00:00:00');
        $existingOvertimeSeconds = ($h * 3600) + ($m * 60) + $s;
        $newOvertimeSeconds = ($workedDuration->h * 3600) + ($workedDuration->i * 60) + $workedDuration->s;
        $totalOvertimeSeconds = $existingOvertimeSeconds + $newOvertimeSeconds;
        $attendance->update([
            'punch_out_again' => $punchOutAgain,
            'punch_out_again_remarks' => $request->punch_out_again_remarks,
            'overtime_working_hours' => sprintf(
                '%02d:%02d:%02d',
                floor($totalOvertimeSeconds / 3600),
                floor(($totalOvertimeSeconds % 3600) / 60),
                $totalOvertimeSeconds % 60
            ),
        ]);
        return response()->json(['success' => true, 'message' => 'Punched out again successfully', 'attendance' => $attendance]);
    }
    public function attendance()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
        $start = now()->startOfWeek(Carbon::MONDAY);
        $end = now()->endOfWeek(Carbon::SUNDAY);
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
                $data[$dateStr] = [
                    'status' => 1,
                    'punch' => [
                        'in' => $att->punch_in,
                        'out' => $att->punch_out,
                        'in_again' => $att->punch_in_again ?? null,
                        'out_again' => $att->punch_out_again ?? null,
                    ],
                    'hours' => floatval($att->total_working_hours),
                ];
            } else {
                $data[$dateStr] = [
                    'status' => 0,
                    'punch' => null,
                    'hours' => 0,
                ];
            }
        }
        return response()->json($data);
    }
    public function monthlyHolidays()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $holidays = Holiday::whereBetween('date', [$start, $end])
            ->get()
            ->mapWithKeys(function ($h) {
                return [
                    Carbon::parse($h->date)->format('Y-m-d') => [
                        'title' => $h->title ?? 'Holiday',
                    ],
                ];
            });
        return response()->json($holidays);
    }

    public function weeklyLeaves()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
        $start = now()->startOfWeek(Carbon::MONDAY);
        $end = now()->endOfWeek(Carbon::SUNDAY);
        $leaves = Leave::where('user_id', $user->id)
            ->where('status', 'approved')
            ->where(function ($q) use ($start, $end) {
                $q->whereBetween('start_date', [$start, $end])
                    ->orWhereBetween('end_date', [$start, $end]);
            })
            ->with('leaveType')
            ->get();
        $data = [];
        $period = new CarbonPeriod($start, $end);
        foreach ($period as $date) {
            $dateStr = $date->toDateString();
            $onLeave = $leaves->first(function ($leave) use ($dateStr) {
                $startDate = Carbon::parse($leave->start_date)->toDateString();
                $endDate = Carbon::parse($leave->end_date)->toDateString();
                return $dateStr >= $startDate && $dateStr <= $endDate;
            });
            if ($onLeave) {
                $data[$dateStr] = [
                    'type' => $onLeave->leaveType->name ?? 'Leave',
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
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->addMonths(6)->endOfMonth();
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
        $tasks = Task::whereHas('assignedUsers', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
            ->whereBetween('due_date', [$start, $end])
            ->get();
        $data = [];
        foreach ($tasks as $task) {
            $dueDate = Carbon::parse($task->due_date)->toDateString();
            if (!isset($data[$dueDate])) {
                $data[$dueDate] = [];
            }
            $data[$dueDate][] = [
                'title' => $task->title,
                'project' => $task->project->title ?? 'N/A',
                'priority' => $task->priority,
                'status' => $task->status,
                'hours_assigned' => $task->hours_assigned ?? null,
            ];
        }
        return response()->json($data);
    }
}
