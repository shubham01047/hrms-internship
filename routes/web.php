<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrmsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hrms' , [HrmsController::class , 'index']);
