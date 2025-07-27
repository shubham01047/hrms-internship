<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AttendanceController;

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
});
