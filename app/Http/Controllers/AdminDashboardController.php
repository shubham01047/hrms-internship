<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(5);

        $leaves = Leave::with('leaveType')
            ->where('user_id', auth()->id())
            ->get();

        return view('admin_dashboard', compact('employees', 'leaves'));
    }
}