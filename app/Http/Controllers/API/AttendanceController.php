<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\BreakModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    public function punchIn(Request $request)
    {
        $user = auth()->user();
        $today = now()->toDateString();

        $attendance = Attendance::firstOrCreate(
            ['user_id' => $user->id, 'date' => $today],
            ['punch_in' => now()->format('H:i:s')]
        );

        return response()->json([
            'message' => 'Punched in successfully.',
            'data' => $attendance
        ], 200);
    }

    public function startBreak(Request $request)
    {
        $user = auth()->user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', now())
            ->first();

        if (!$attendance) {
            return response()->json(['message' => 'No active attendance found.'], 400);
        }

        $activeBreak = BreakModel::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();

        if ($activeBreak) {
            return response()->json(['message' => 'You already have an active break.'], 400);
        }

        $break = BreakModel::create([
            'attendance_id' => $attendance->id,
            'break_type' => $request->break_type,
            'break_start' => now()->format('H:i:s'),
        ]);

        return response()->json([
            'message' => 'Break started successfully.',
            'data' => $break
        ], 200);
    }

    public function endBreak(Request $request)
    {
        $user = auth()->user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', now())
            ->first();

        if (!$attendance) {
            return response()->json(['message' => 'Attendance not found.'], 404);
        }

        $break = BreakModel::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();

        if (!$break) {
            return response()->json(['message' => 'No active break.'], 400);
        }

        $break->break_end = now()->format('H:i:s');
        $breakStart = Carbon::parse($break->break_start);
        $breakEnd = Carbon::parse($break->break_end);
        $interval = $breakStart->diff($breakEnd);
        $break->total_break_time = $interval->format('%H:%I:%S');
        $break->save();

        return response()->json([
            'message' => 'Break ended successfully.',
            'data' => $break
        ], 200);
    }

    public function punchOut()
    {
        $user = auth()->user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', now())
            ->first();

        if (!$attendance || $attendance->punch_out) {
            return response()->json(['message' => 'Already punched out or not punched in yet.'], 400);
        }

        $punchOutTime = now()->format('H:i:s');
        $punchIn = Carbon::createFromFormat('H:i:s', $attendance->punch_in);
        $punchOut = Carbon::createFromFormat('H:i:s', $punchOutTime);
        $workedDuration = $punchOut->diff($punchIn);
        $totalWorked = sprintf(
            '%02d:%02d:%02d',
            $workedDuration->h,
            $workedDuration->i,
            $workedDuration->s
        );

        $attendance->update([
            'punch_out' => $punchOutTime,
            'total_working_hours' => $totalWorked,
        ]);

        return response()->json([
            'message' => 'Punched out successfully.',
            'data' => $attendance
        ], 200);
    }

    public function today()
    {
        $user = auth()->user();
        $attendance = Attendance::with('breaks')
            ->where('user_id', $user->id)
            ->where('date', now()->toDateString())
            ->first();

        return response()->json(['data' => $attendance], 200);
    }

    public function userAttendance($user_id)
    {
        $attendance = Attendance::with('breaks')
            ->where('user_id', $user_id)
            ->orderByDesc('date')
            ->take(30)
            ->get();

        return response()->json(['data' => $attendance], 200);
    }
}
