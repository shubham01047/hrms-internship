<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\BreakModel;
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
}
