<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BreakModel;
use Illuminate\Http\Request;
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
        $user = auth()->user();
        $today = now()->toDateString();
        $attendance = Attendance::firstOrCreate(
            ['user_id' => $user->id, 'date' => $today],
            ['punch_in' => now()->format('H:i:s')]
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

    public function punchOut()
    {
        $user = auth()->user();
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', now())
            ->first();

        if (!$attendance || $attendance->punch_out) {
            return redirect()->back()->with('error', 'Already punched out or not punched in yet.');
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
        return redirect()->back()->with('success', 'Punched out successfully.');
    }
}
