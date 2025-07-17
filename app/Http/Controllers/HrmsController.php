<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrmsController extends Controller
{
    public function index() {
        return view('hrms.index');
    }

     public function login() {
        return view('login.login');
    }

     public function register() {
        return view('login.register');
    }

    public function employee() {
        return view('employee');  
    }
}
