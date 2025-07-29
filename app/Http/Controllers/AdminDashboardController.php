<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BreakModel;
use App\Models\Employee;
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

    // Get tomorrow's date
    $tomorrow = Carbon::tomorrow();

    // Filter employees whose birthday is tomorrow (ignoring year)
    $employeesWithBirthdayTomorrow = Employee::whereMonth('date_of_birth', $tomorrow->month)
        ->whereDay('date_of_birth', $tomorrow->day)
        ->get();

    return view('admin_dashboard', compact('employees', 'employeesWithBirthdayTomorrow'));
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
                    'name' => $attendance->user->name,
                    'punch_in' => $attendance->punch_in ? Carbon::parse($attendance->punch_in)->format('h:i A') : '-',
                    'punch_out' => $attendance->punch_out ? Carbon::parse($attendance->punch_out)->format('h:i A') : '-',
                    'total_working_hours' => $attendance->total_working_hours ?? '00:00:00',
                    'total_break_time' => gmdate('H:i:s', $totalBreakSeconds),
                    'breaks' => $breakDetails,
                ];
            });
        return view('admin.attendance_report', compact('attendances'));
    }
}