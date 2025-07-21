<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EmployeeController extends Controller implements HasMiddleware
{
    
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view employee', only: ['index']),
            new Middleware('permission:edit employee', only: ['edit']),
            new Middleware('permission:create employee', only: ['create']),
            new Middleware('permission:delete employee', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.list', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|min:3'
        ]);
        if ($validator->passes()) {
            $employees = new Employee();
            $employees->first_name = $request->first_name;
            $employees->last_name = $request->last_name;
            $employees->email = $request->email;
            $employees->save();
            return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
        } else {
            return redirect()->route('employees.create')->withInput()->withErrors($validator);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employees = Employee::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|min:3'
        ]);
        if ($validator->passes()) {
            $employees->first_name = $request->first_name;
            $employees->last_name = $request->last_name;
            $employees->email = $request->email;
            $employees->save();
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
        } else {
            return redirect()->route('employees.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id);

        if ($employee == null) {
            session()->flash('error','Employee not found.');
            return response()->json([
                'status' => false
            ]);
        }

        $employee->delete();
        session()->flash('success', 'Employee deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
}
