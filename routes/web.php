<?php

use App\Http\Controllers\GoogleController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrmsController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google/redirect',[GoogleController::class,'index'])->name('google.auth');
Route::get('/auth/google/callback',[GoogleController::class,'verify']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/hrms' , [HrmsController::class , 'index'])->name('index.index');
// Route::get('/login' , [HrmsController::class , 'login'])->name('login.login');
// Route::get('/register' , [HrmsController::class , 'register'])->name('login.register'); 

// routes/web.php
Route::get('/admin/company', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/admin/company', [CompanyController::class, 'update'])->name('company.update');

