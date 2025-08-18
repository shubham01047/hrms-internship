<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\Attendance;
use App\Models\BreakModel;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardApiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $employees = Employee::all();
        $tomorrow = Carbon::tomorrow();

        $employeesWithBirthdayTomorrow = Employee::whereMonth('date_of_birth', $tomorrow->month)
            ->whereDay('date_of_birth', $tomorrow->day)
            ->get();

        $pendingLeaves = Leave::where('status', 'pending')->count();

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
        $projectCount = Project::count();

        $topPerformer = Attendance::select('user_id', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(total_working_hours) + TIME_TO_SEC(overtime_working_hours))) as total_hours'))
            ->groupBy('user_id')
            ->orderByDesc(DB::raw('SUM(TIME_TO_SEC(total_working_hours) + TIME_TO_SEC(overtime_working_hours))'))
            ->with('user')
            ->first();

        $attendancePercentage = ($employeeCount > 0) ? round(($todayPunchInCount / $employeeCount) * 100, 2) : 0;

        $projects = Project::with(['tasks.assignedUsers'])->get();
        $projectsThisWeek = Project::with(['tasks.assignedUsers'])
            ->whereBetween('deadline', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->get();

        $holidaysThisWeek = Holiday::whereBetween('date', [
            Carbon::now(),
            Carbon::now()->endOfWeek()
        ])->orderBy('date', 'asc')->get();

        return response()->json([
            'employees' => $employees,
            'employees_with_birthday_tomorrow' => $employeesWithBirthdayTomorrow,
            'pending_leaves' => $pendingLeaves,
            'today_punch_in_count' => $todayPunchInCount,
            'project_count' => $projectCount,
            'absentees' => $absentees,
            'attendance_percentage' => $attendancePercentage,
            'projects' => $projects,
            'projects_this_week' => $projectsThisWeek,
            'holidays_this_week' => $holidaysThisWeek,
            'top_performer' => $topPerformer,
        ]);
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
                    'punch_in' => $attendance->punch_in,
                    'punch_out' => $attendance->punch_out,
                    'total_working_hours' => $attendance->total_working_hours ?? '00:00:00',
                    'punch_in_again' => $attendance->punch_in_again,
                    'punch_out_again' => $attendance->punch_out_again,
                    'overtime_working_hours' => $attendance->overtime_working_hours ?? '00:00:00',
                    'total_break_time' => gmdate('H:i:s', $totalBreakSeconds),
                    'breaks' => $breakDetails,
                ];
            });

        return response()->json([
            'from_date' => $fromDate,
            'to_date' => $toDate,
            'attendances' => $attendances,
        ]);
    }

    public function attendanceChart(Request $request)
    {
        $years = Attendance::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        $selectedYear = $request->input('year', now()->year);

        $monthlyData = Attendance::selectRaw('MONTH(date) as month, COUNT(DISTINCT date) as present_days')
            ->whereYear('date', $selectedYear)
            ->whereNotNull('punch_in')
            ->groupByRaw('MONTH(date)')
            ->get()
            ->pluck('present_days', 'month');

        $monthlyAttendance = [];
        for ($i = 1; $i <= 12; $i++) {
            $present = $monthlyData[$i] ?? 0;
            $workingDays = 22;
            $percentage = ($workingDays > 0) ? round(($present / $workingDays) * 100, 2) : 0;
            $monthlyAttendance[] = $percentage;
        }

        return response()->json([
            'years' => $years,
            'selected_year' => $selectedYear,
            'monthly_attendance' => $monthlyAttendance,
        ]);
    }
    public function downloadReport(Request $request)
{
    $request->validate([
        'from' => 'required|date',
        'to' => 'required|date',
        'type' => 'required|in:pdf,excel',
    ]);

    $attendance = Attendance::whereBetween('date', [$request->from, $request->to])
        ->with('user')
        ->get();

    if ($attendance->isEmpty()) {
        return response()->json(['error' => 'No records found for selected range.'], 404);
    }

    // ✅ CSV/Excel
    if ($request->type === 'excel') {
        $filename = 'attendance_report.csv';
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename={$filename}",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = [
            'Date',
            'User',
            'Punch-In',
            'Punch-Out',
            'Total Working Hours',
            'Punch-In-Again',
            'Punch-Out-Again',
            'Total Overtime Working Hours',
            'Location'
        ];

        $callback = function () use ($attendance, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($attendance as $sheet) {
                fputcsv($file, [
                    $sheet->date ? $sheet->date->format('Y-m-d') : '',
                    $sheet->user->name ?? 'N/A',
                    $sheet->punch_in ? $sheet->punch_in->format('H:i:s') : '',
                    $sheet->punch_out ? $sheet->punch_out->format('H:i:s') : '',
                    $sheet->total_working_hours ?? 'N/A',
                    $sheet->punch_in_again ? $sheet->punch_in_again->format('H:i:s') : 'N/A',
                    $sheet->punch_out_again ? $sheet->punch_out_again->format('H:i:s') : 'N/A',
                    $sheet->overtime_working_hours ?? 'N/A',
                    $sheet->location_type ?? 'N/A',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // ✅ PDF
    if ($request->type === 'pdf') {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.report_pdf', [
            'attendance' => $attendance,
            'from' => $request->from,
            'to' => $request->to,
        ]);

        return $pdf->download('attendance_report.pdf');
    }

    return response()->json(['error' => 'Invalid export type'], 400);
}

}
