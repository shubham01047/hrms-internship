<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskCommentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\WorklogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionConrtoller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google/redirect', [GoogleController::class, 'index'])->name('google.auth');
Route::get('/auth/google/callback', [GoogleController::class, 'verify']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Permissions Route
    Route::get('/permissions', [PermissionConrtoller::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionConrtoller::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionConrtoller::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionConrtoller::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionConrtoller::class, 'update'])->name('permissions.update');
    Route::delete('/permissions', [PermissionConrtoller::class, 'destroy'])->name('permissions.destroy');

    //Role Route
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    //Employee Route
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    //Users Route
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    // Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    //Redirection of Admin, HR, Manager and Employee
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::view('/hr/dashboard', 'hr_dashboard')->name('hr.dashboard');
    Route::view('/manager/dashboard', 'manager_dashboard')->name('manager.dashboard');

    //Punchin/Punchout & Breaks routes
    Route::view('/employee/dashboard', 'employee_dashboard')->name('employee.dashboard');
    Route::post('/start-break', [AttendanceController::class, 'startBreak'])->name('attendance.startBreak');
    Route::post('/end-break', [AttendanceController::class, 'endBreak'])->name('attendance.endBreak');
    Route::post('/punch-in', [AttendanceController::class, 'punchIn'])->name('attendance.punchIn');
    Route::post('/punch-out', [AttendanceController::class, 'punchOut'])->name('attendance.punchOut');
    Route::post('/punch-in-again', [AttendanceController::class, 'punchInAgain'])->name('attendance.punchInAgain');
    Route::post('/punch-out-again', [AttendanceController::class, 'punchOutAgain'])->name('attendance.punchOutAgain');


    //Leaves and leaves type routes
    Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::get('/leaves/apply', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
    Route::get('/leaves/manage', [LeaveController::class, 'manage'])->name('leaves.manage');
    Route::post('/leaves/{id}/approve', [LeaveController::class, 'approve'])->name('leaves.approve');
    Route::post('/leaves/{id}/reject', [LeaveController::class, 'reject'])->name('leaves.reject');

    //Attendance Report
    Route::get('/admin/attendance-report', [AdminDashboardController::class, 'showAttendanceReport'])->name('admin.attendance.report');

    //Holidays Routes WEB
    Route::get('/holidays', [HolidayController::class, 'index'])->name('holidays.index');
    Route::get('/holidays/create', [HolidayController::class, 'create'])->name('holidays.create');
    Route::post('/holidays', [HolidayController::class, 'store'])->name('holidays.store');
    Route::delete('/holidays/{id}', [HolidayController::class, 'destroy'])->name('holidays.destroy');

    //Project & Task Module Routes Nested Under Tasks Routes WEB
    Route::resource('projects', ProjectController::class);
    Route::prefix('projects/{project}')->group(function () {
        Route::get('tasks', [TaskController::class, 'showTasksForProject'])->name('projects.tasks.index');
        Route::get('tasks/create', [TaskController::class, 'create'])->name('projects.tasks.create');
        Route::post('tasks', [TaskController::class, 'store'])->name('projects.tasks.store');
        Route::get('tasks/{task}', [TaskController::class, 'show'])->name('projects.tasks.show');
        Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('projects.tasks.edit');
        Route::put('tasks/{task}', [TaskController::class, 'update'])->name('projects.tasks.update');
        Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('projects.tasks.destroy');
        Route::delete('/members/{user}', [ProjectController::class, 'removeMember'])->name('projects.members.remove');
    });
    Route::resource('timesheets', TimesheetController::class);
    Route::prefix('projects/{project}/tasks/{task}')->group(function () {
        Route::post('/comments', [TaskCommentController::class, 'store'])->name('tasks.comments.store');
        Route::get('/comments', [TaskCommentController::class, 'index'])->name('tasks.comments.index');
        Route::get('/timesheets/create', [TimesheetController::class, 'create'])->name('tasks.timesheets.create');
        Route::post('/timesheets', [TimesheetController::class, 'store'])->name('tasks.timesheets.store');
        Route::get('/timesheets', [TimesheetController::class, 'index'])->name('tasks.timesheets.index');
        Route::get('/timesheets/{timesheet}/edit', [TimesheetController::class, 'edit'])->name('tasks.timesheets.edit');
        Route::put('/timesheets/{timesheet}', [TimesheetController::class, 'update'])->name('tasks.timesheets.update');

    });
    Route::get('/projects/{project}/tasks/{task?}', [ProjectController::class, 'show'])->name('tasks.show');
    Route::put('/timesheets/{timesheet}/approve', [TimesheetController::class, 'approve'])->name('timesheets.approve');
    Route::put('/timesheets/{timesheet}/reject', [TimesheetController::class, 'reject'])->name('timesheets.reject');

});

require __DIR__ . '/auth.php';

// routes/web.php
Route::get('/admin/company', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/admin/company', [CompanyController::class, 'update'])->name('company.update');
