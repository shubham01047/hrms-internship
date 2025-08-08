<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LeaveTypesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:create leave type', only: ['create']),
            new Middleware('permission:edit leave type', only: ['edit']),
            new Middleware('permission:view leave type', only: ['index']),
            new Middleware('permission:delete leave type', only: ['delete']),
        ];
    }
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return view('leave_types.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('leave_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        try {
            LeaveType::create($request->all());
            return redirect()->route('leave-types.index')->with('success', 'Leave Type created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create leave type.');
        }
    }
    public function edit(LeaveType $leaveType)
    {
        return view('leave_types.edit', compact('leaveType'));
    }
    public function update(Request $request, LeaveType $leaveType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $leaveType->update($request->all());
        try {
            LeaveType::create($request->all());
            return redirect()->route('leave-types.index')->with('success', 'Leave Type updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update leave type.');
        }
    }
    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();
        return redirect()->route('leave-types.index')->with('error', 'Leave Type deleted successfully.');
    }
}

