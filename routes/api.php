<?php

use App\Http\Controllers\Api\AdminDashboardApiController;
use App\Http\Controllers\API\HolidayApiController;
use App\Http\Controllers\API\LeaveApiController;
use App\Http\Controllers\Api\LeaveTypesApiController;
use App\Http\Controllers\Api\PayrollApiController;
use App\Http\Controllers\Api\PermissionApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\SalaryStructureApiController;
use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\Api\TaskCommentApiController;
use App\Http\Controllers\Api\TimesheetApiController;
use App\Http\Controllers\Api\TimesheetReportController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\API\RoleApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AttendanceApiController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    //Users Routes API
    Route::get('/users', [UserApiController::class, 'index']);
    Route::get('/users/{id}', [UserApiController::class, 'show']);
    Route::post('/users', [UserApiController::class, 'store']);
    Route::put('/users/{id}', [UserApiController::class, 'update']);
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);

    // Get list of all roles
    Route::get('/roles', [UserApiController::class, 'roles']);

    //Attendance Routes API
    Route::get('/attendance', [AttendanceApiController::class, 'index']);
    Route::post('/attendance/punch-in', [AttendanceApiController::class, 'punchIn']);
    Route::post('/attendance/punch-out', [AttendanceApiController::class, 'punchOut']);
    Route::post('/attendance/start-break', [AttendanceApiController::class, 'startBreak']);
    Route::post('/attendance/end-break', [AttendanceApiController::class, 'endBreak']);
    Route::post('/attendance/punch-in-again', [AttendanceApiController::class, 'punchInAgain']);
    Route::post('/attendance/punch-out-again', [AttendanceApiController::class, 'punchOutAgain']);
    Route::get('/attendance/{user_id}', [AttendanceApiController::class, 'userAttendance']);

    //Leave Rooutes API
    Route::post('/leaves', [LeaveApiController::class, 'store']);
    Route::get('/leaves/mine', [LeaveApiController::class, 'myLeaves']);
    Route::get('/leaves/pending', [LeaveApiController::class, 'pending']);
    Route::put('/leaves/{id}/approve', [LeaveApiController::class, 'approve']);
    Route::put('/leaves/{id}/reject', [LeaveApiController::class, 'reject']);
    Route::get('/leaves/report', [LeaveApiController::class, 'report']);

    //Holidays Routes API
    Route::get('/holidays', [HolidayApiController::class, 'index']);
    Route::post('/holidays', [HolidayApiController::class, 'store']);
    Route::delete('/holidays/{id}', [HolidayApiController::class, 'destroy']);

    //Leqave Type Routes API
    Route::get('/leave-types', [LeaveTypesApiController::class, 'index']);
    Route::post('/leave-types', [LeaveTypesApiController::class, 'store']);
    Route::get('/leave-types/{id}', [LeaveTypesApiController::class, 'show']);
    Route::put('/leave-types/{id}', [LeaveTypesApiController::class, 'update']);
    Route::delete('/leave-types/{id}', [LeaveTypesApiController::class, 'destroy']);

    //Dashboard (attendance report and chart) Routes API
    Route::get('/dashboard', [AdminDashboardApiController::class, 'index']);
    Route::get('/dashboard/attendance-report', [AdminDashboardApiController::class, 'showAttendanceReport']);
    Route::get('/dashboard/download-report', [AdminDashboardApiController::class, 'downloadReport']);
    Route::get('/dashboard/attendance-chart', [AdminDashboardApiController::class, 'attendanceChart']);

    //Permission Routes API
    Route::get('/permissions', [PermissionApiController::class, 'index']);
    Route::post('/permissions', [PermissionApiController::class, 'store']);
    Route::get('/permissions/{id}', [PermissionApiController::class, 'show']);
    Route::put('/permissions/{id}', [PermissionApiController::class, 'update']);
    Route::delete('/permissions/{id}', [PermissionApiController::class, 'destroy']);

    //Roles Route API
    Route::get('/roles', [RoleApiController::class, 'index']);
    Route::post('/roles', [RoleApiController::class, 'store']);
    Route::put('/roles/{id}', [RoleApiController::class, 'update']);
    Route::delete('/roles/{id}', [RoleApiController::class, 'destroy']);

    //Project Routes API
    Route::get('/projects', [ProjectApiController::class, 'index']);
    Route::post('/projects', [ProjectApiController::class, 'store']);
    Route::get('/projects/{id}', [ProjectApiController::class, 'show']);
    Route::put('/projects/{id}', [ProjectApiController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectApiController::class, 'destroy']);

    //Task Routes API
    Route::get('/projects/{projectId}/tasks', [TaskApiController::class, 'index']);
    Route::post('/projects/{projectId}/tasks', [TaskApiController::class, 'store']);
    Route::get('/projects/{projectId}/tasks/{taskId}', [TaskApiController::class, 'show']);
    Route::put('/projects/{projectId}/tasks/{taskId}', [TaskApiController::class, 'update']);
    Route::delete('/projects/{projectId}/tasks/{taskId}', [TaskApiController::class, 'destroy']);

    //Task Commants Route API
    Route::get('/projects/{projectId}/tasks/{taskId}/comments', [TaskCommentApiController::class, 'index']);
    Route::post('/projects/{projectId}/tasks/{taskId}/comments', [TaskCommentApiController::class, 'store']);

    // Timesheets Route API
    Route::get('/projects/{projectId}/tasks/{taskId}/timesheets', [TimesheetApiController::class, 'index']);
    Route::post('/projects/{projectId}/tasks/{taskId}/timesheets', [TimesheetApiController::class, 'store']);
    Route::get('/projects/{projectId}/tasks/{taskId}/timesheets/{id}', [TimesheetApiController::class, 'show']);
    Route::put('/projects/{projectId}/tasks/{taskId}/timesheets/{id}', [TimesheetApiController::class, 'update']);
    Route::put('/timesheets/{id}/approve', [TimesheetApiController::class, 'approve']);
    Route::put('/timesheets/{id}/reject', [TimesheetApiController::class, 'reject']);
    Route::get('/projects/{projectId}/tasks/{taskId}/timesheet-report', TimesheetReportController::class);

    //Salary Structure Routes API
    Route::get('/salary-structures', [SalaryStructureApiController::class, 'index']);
    Route::get('/salary-structures/trashed', [SalaryStructureApiController::class, 'trashed']);
    Route::get('/salary-structures/{salaryStructureId}', [SalaryStructureApiController::class, 'show']);
    Route::post('/salary-structures', [SalaryStructureApiController::class, 'store']);
    Route::put('/salary-structures/{salaryStructureId}', [SalaryStructureApiController::class, 'update']);
    Route::delete('/salary-structures/{salaryStructureId}', [SalaryStructureApiController::class, 'destroy']);
    Route::post('/salary-structures/{salaryStructureId}/restore', [SalaryStructureApiController::class, 'restore']);

    //Payroll Routes API
    Route::delete('/payrolls/destroy-all', [PayrollApiController::class, 'destroyAll']);
    Route::get('/payrolls', [PayrollApiController::class, 'index']);
    Route::get('/payrolls/{payrollId}', [PayrollApiController::class, 'show']);
    Route::post('/payrolls/generate/{userId}/{month}', [PayrollApiController::class, 'generate']);
    Route::post('/payrolls/generate-all/{month}', [PayrollApiController::class, 'generateAll']);
    Route::delete('/payrolls/{payrollId}', [PayrollApiController::class, 'destroy']);


});
