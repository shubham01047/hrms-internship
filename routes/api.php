<?php

use App\Http\Controllers\API\HolidayApiController;
use App\Http\Controllers\API\LeaveApiController;
use App\Http\Controllers\Api\LeaveTypesApiController;
use App\Http\Controllers\API\UserApiController;
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

    //Project Routes API
    
});
