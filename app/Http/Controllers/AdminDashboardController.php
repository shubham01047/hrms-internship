<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BreakModel;
use App\Models\Employee;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AdminDashboardController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:attendance report', only: ['attendance_report']),
        ];
    }
    public function index()
    {
        $employees = Employee::all();
        $tomorrow = Carbon::tomorrow();
        $employeesWithBirthdayTomorrow = Employee::whereMonth('date_of_birth', $tomorrow->month)
            ->whereDay('date_of_birth', $tomorrow->day)
            ->get();
        $pendingLeaves = Leave::where('status', 'pending')->count();
        return view('admin_dashboard', compact('employees', 'employeesWithBirthdayTomorrow', 'pendingLeaves'));
    }
    public function showAttendanceReport()
    {
        $today = now()->toDateString();
        $attendances = Attendance::with('user')
            ->whereDate('date', $today)
            ->get()
            ->map(function ($attendance) {
                $breaks = BreakModel::where('attendance_id', $attendance->id)->get();
                $breakDetails = [];
                $totalBreakSeconds = 0;
                foreach ($breaks as $break) {
                    if ($break->break_end && $break->total_break_time) {
                        $durationInSeconds = strtotime($break->total_break_time) - strtotime('TODAY');
                        $totalBreakSeconds += $durationInSeconds;
                        $breakDetails[] = [
                            'type' => $break->break_type,
                            'duration' => $break->total_break_time,
                        ];
                    } elseif ($break->break_start && !$break->break_end) {
                        $breakDetails[] = [
                            'type' => $break->break_type,
                            'duration' => 'In Progress',
                        ];
                    }
                }
                return [
                    //pUnchin/Punchout Displaying
                    'name' => $attendance->user->name,
                    'punch_in' => $attendance->punch_in ? Carbon::parse($attendance->punch_in)->format('h:i A') : '-',
                    'punch_in_remarks' => $attendance->punch_in_remarks,
                    'punch_out' => $attendance->punch_out ? Carbon::parse($attendance->punch_out)->format('h:i A') : '-',
                    'punch_out_remarks' => $attendance->punch_out_remarks,
                    'total_working_hours' => $attendance->total_working_hours ?? '00:00:00',
                    //Extra Punchin/punchoyt Displaying
                    'punch_in_again' => $attendance->punch_in_again ? Carbon::parse($attendance->punch_in_again)->format('h:i A') : '-',
                    'punch_in_again_remarks' => $attendance->punch_in_again_remarks,
                    'punch_out_again' => $attendance->punch_out_again ? Carbon::parse($attendance->punch_out_again)->format('h:i A') : '-',
                    'punch_out_again_remarks' => $attendance->punch_out_again_remarks,
                    'overtime_working_hours' => $attendance->overtime_working_hours ?? '00:00:00',
                    //Breaks displaying
                    'total_break_time' => gmdate('H:i:s', $totalBreakSeconds),
                    'breaks' => $breakDetails,
                ];
            });
        return view('admin.attendance_report', compact('attendances'));
    }
}