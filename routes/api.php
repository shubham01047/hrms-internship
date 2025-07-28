<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\API\LeaveController;
use App\Http\Controllers\API\HolidayController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    //Users Routes API
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    //Attendance Routes API
    Route::post('/attendance/punch-in', [AttendanceController::class, 'punchIn']);
    Route::post('/attendance/break-start', [AttendanceController::class, 'startBreak']);
    Route::post('/attendance/break-end', [AttendanceController::class, 'endBreak']);
    Route::post('/attendance/punch-out', [AttendanceController::class, 'punchOut']);
    Route::get('/attendance/today', [AttendanceController::class, 'today']);
    Route::get('/attendance/{user_id}', [AttendanceController::class, 'userAttendance']);

    //Leave Rooutes API
    Route::post('/leaves', [LeaveController::class, 'store']);
    Route::get('/leaves/mine', [LeaveController::class, 'myLeaves']);
    Route::get('/leaves/pending', [LeaveController::class, 'pending']);
    Route::put('/leaves/{id}/approve', [LeaveController::class, 'approve']);
    Route::put('/leaves/{id}/reject', [LeaveController::class, 'reject']);
    Route::get('/leaves/report', [LeaveController::class, 'report']);

    //Holidays Routes API
    Route::get('/holidays', [HolidayController::class, 'index']);
    Route::post('/holidays', [HolidayController::class, 'store']);
    Route::delete('/holidays/{id}', [HolidayController::class, 'destroy']);
});
