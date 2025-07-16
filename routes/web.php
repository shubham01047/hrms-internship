<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrmsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hrms' , [HrmsController::class , 'index'])->name('index.index');
Route::get('/login' , [HrmsController::class , 'login'])->name('login.login');
Route::get('/register' , [HrmsController::class , 'register'])->name('login.register');
