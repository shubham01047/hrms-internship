<?php

namespace App\Http\Controllers\Api;

use App\Models\Attendance;
use App\Models\BreakTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function punchIn(Request $request)
    {
        $user = Auth::user();

        $attendance = Attendance::create([
            'user_id' => $user->id,
            'date' => Carbon::today(),
            'punch_in' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Punched in successfully', 'data' => $attendance]);
    }

    public function startBreak(Request $request)
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->where('date', Carbon::today())->first();

        if (!$attendance) {
            return response()->json(['message' => 'Punch in first'], 400);
        }

        $break = BreakTime::create([
            'attendance_id' => $attendance->id,
            'break_start' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Break started', 'data' => $break]);
    }

    public function endBreak(Request $request)
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->where('date', Carbon::today())->first();

        if (!$attendance) {
            return response()->json(['message' => 'Punch in first'], 400);
        }

        $break = BreakTime::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();

        if (!$break) {
            return response()->json(['message' => 'No active break found'], 400);
        }

        $break->update(['break_end' => Carbon::now()]);

        return response()->json(['message' => 'Break ended', 'data' => $break]);
    }

    public function punchOut(Request $request)
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->where('date', Carbon::today())->first();

        if (!$attendance || $attendance->punch_out) {
            return response()->json(['message' => 'Already punched out or not punched in'], 400);
        }

        $attendance->update(['punch_out' => Carbon::now()]);

        return response()->json(['message' => 'Punched out successfully', 'data' => $attendance]);
    }

    public function today()
    {
        $user = Auth::user();
        $attendance = Attendance::with('breaks')
            ->where('user_id', $user->id)
            ->where('date', Carbon::today())
            ->first();

        return response()->json(['data' => $attendance]);
    }

    public function userAttendance($user_id)
    {
        $attendance = Attendance::with('breaks')
            ->where('user_id', $user_id)
            ->orderByDesc('date')
            ->take(30)
            ->get();

        return response()->json(['data' => $attendance]);
    }
}
