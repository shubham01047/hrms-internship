<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
       

        return view('admin_dashboard');
    }
}