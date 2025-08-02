<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BreakModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

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
        ]);
        $user = auth()->user();
        $today = now()->toDateString();
        $attendance = Attendance::firstOrCreate(
            ['user_id' => $user->id, 'date' => $today],
            [
                'punch_in' => now()->format('H:i:s'),
                'punch_in_remarks' => $request->input('punch_in_remarks'),
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
}
