<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BreakModel;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        //all employee
        $employees = Employee::all();
        //birthday tomorrow
        $tomorrow = Carbon::tomorrow();
        $employeesWithBirthdayTomorrow = Employee::whereMonth('date_of_birth', $tomorrow->month)
            ->whereDay('date_of_birth', $tomorrow->day)
            ->get();
        //leaves    
        $pendingLeaves = Leave::where('status', 'pending')->count();
        //punch in today
        $today = Carbon::today()->toDateString();
        $todayPunchInCount = DB::table('attendance')
            ->whereDate('date', $today)
            ->where(function ($query) {
                $query->whereNotNull('punch_in')
                    ->orWhereNotNull('punch_in_again');
            })
            ->distinct('user_id')
            ->count('user_id');
        $employeeCount = User::whereHas('employee')->count();
        $absentees = $employeeCount - $todayPunchInCount;
        //projects
        $projectCount = Project::count();
        //percentage
        $attendancePercentage = 0;
        if ($employeeCount > 0) {
            $attendancePercentage = round(($todayPunchInCount / $employeeCount) * 100, 2);
        }
        return view('admin_dashboard', compact('employees', 'employeesWithBirthdayTomorrow', 'pendingLeaves', 'todayPunchInCount', 'projectCount', 'absentees', 'attendancePercentage'));
    }
    public function showAttendanceReport(Request $request)
    {
        $fromDate = $request->input('from_date', now()->toDateString());
        $toDate = $request->input('to_date', now()->toDateString());
        if ($toDate < $fromDate) {
            [$fromDate, $toDate] = [$toDate, $fromDate];
        }
        $attendances = Attendance::with('user')
            ->whereBetween('date', [$fromDate, $toDate])
            ->get()
            ->map(function ($attendance) {
                $breaks = BreakModel::where('attendance_id', $attendance->id)->get();
                $breakDetails = [];
                $totalBreakSeconds = 0;
                foreach ($breaks as $break) {
                    if (
                        $break->break_end &&
                        $break->total_break_time &&
                        preg_match('/^\d{2}:\d{2}:\d{2}$/', $break->total_break_time)
                    ) {
                        [$h, $m, $s] = explode(':', $break->total_break_time);
                        $durationInSeconds = ($h * 3600) + ($m * 60) + $s;
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
                    'name' => $attendance->user->name ?? 'Unknown',

                    'punch_in' => $attendance->punch_in
                        ? Carbon::parse($attendance->punch_in)->format('h:i A')
                        : null,
                    'punch_in_remarks' => $attendance->punch_in_remarks ?? null,

                    'punch_out' => $attendance->punch_out
                        ? Carbon::parse($attendance->punch_out)->format('h:i A')
                        : null,
                    'punch_out_remarks' => $attendance->punch_out_remarks ?? null,

                    'total_working_hours' => $attendance->total_working_hours ?? '00:00:00',

                    'punch_in_again' => $attendance->punch_in_again
                        ? Carbon::parse($attendance->punch_in_again)->format('h:i A')
                        : null,
                    'punch_in_again_remarks' => $attendance->punch_in_again_remarks ?? null,

                    'punch_out_again' => $attendance->punch_out_again
                        ? Carbon::parse($attendance->punch_out_again)->format('h:i A')
                        : null,
                    'punch_out_again_remarks' => $attendance->punch_out_again_remarks ?? null,
                    'overtime_working_hours' => $attendance->overtime_working_hours ?? '00:00:00',
                    'total_break_time' => gmdate('H:i:s', $totalBreakSeconds),
                    'breaks' => $breakDetails,
                ];
            });
        return view('admin.attendance_report', compact('attendances', 'fromDate', 'toDate'));
    }
}