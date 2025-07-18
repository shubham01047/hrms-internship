<?php

use App\Http\Controllers\GoogleController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrmsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PermissionConrtoller;
use App\Http\Controllers\RoleController;

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
});

require __DIR__.'/auth.php';

// Route::get('/hrms' , [HrmsController::class , 'index'])->name('index.index');
// Route::get('/login' , [HrmsController::class , 'login'])->name('login.login');
// Route::get('/register' , [HrmsController::class , 'register'])->name('login.register'); 

// routes/web.php
Route::get('/admin/company', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/admin/company', [CompanyController::class, 'update'])->name('company.update');

