<?php

namespace App\Http\Controllers;

use App\Models\SalaryStructure;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryStructureController extends Controller
{
    public function index()
    {
        $structures = SalaryStructure::with('user')->get();
        return view('salary.index', compact('structures'));
    }

    public function create()
    {
        $users = User::all();
        return view('salary.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'basic' => 'required|numeric',
            'hra' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'pf' => 'nullable|numeric',
            'esi' => 'nullable|numeric',
        ]);

        SalaryStructure::create($request->all());

        return redirect()->route('salary.index')->with('success', 'Salary structure created');
    }
}
