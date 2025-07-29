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
        $employees = Employee::latest()->paginate(20);
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
        'gender' => 'required',
        'date_of_birth' => 'required|date',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postal_code' => 'required',
        'country' => 'required',
        'joining_date' => 'required|date',
        'employment_type' => 'required',
        'status' => 'required',
        'resume' => 'nullable|mimes:pdf|max:2048',
        'id_proof' => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->route('employees.create')->withInput()->withErrors($validator);
    }

    $employee = new Employee();
    $employee->first_name = $request->first_name;
    $employee->last_name = $request->last_name;
    $employee->gender = $request->gender;
    $employee->date_of_birth = $request->date_of_birth;
    $employee->email = $request->email;
    $employee->phone = $request->phone;
    $employee->address = $request->address;
    $employee->city = $request->city;
    $employee->state = $request->state;
    $employee->postal_code = $request->postal_code;
    $employee->country = $request->country;
    $employee->joining_date = $request->joining_date;
    $employee->employment_type = $request->employment_type;
    $employee->status = $request->status;
    $employee->user_id = auth()->id();

    if ($request->hasFile('resume')) {
        $employee->resume = $request->file('resume')->store('resumes', 'public');
    }

    if ($request->hasFile('id_proof')) {
        $employee->id_proof = $request->file('id_proof')->store('id_proofs', 'public');
    }

    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
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
    $employee = Employee::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'gender' => 'required',
        'date_of_birth' => 'required|date',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postal_code' => 'required',
        'country' => 'required',
        'joining_date' => 'required|date',
        'employment_type' => 'required',
        'status' => 'required',
        'resume' => 'nullable|mimes:pdf|max:2048',
        'id_proof' => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->route('employees.edit', $id)->withInput()->withErrors($validator);
    }

    // Update fields
    $employee->first_name = $request->first_name;
    $employee->last_name = $request->last_name;
    $employee->gender = $request->gender;
    $employee->date_of_birth = $request->date_of_birth;
    $employee->email = $request->email;
    $employee->phone = $request->phone;
    $employee->address = $request->address;
    $employee->city = $request->city;
    $employee->state = $request->state;
    $employee->postal_code = $request->postal_code;
    $employee->country = $request->country;
    $employee->joining_date = $request->joining_date;
    $employee->employment_type = $request->employment_type;
    $employee->status = $request->status;

    // Update resume only if a new file is uploaded
    if ($request->hasFile('resume')) {
        $employee->resume = $request->file('resume')->store('resumes', 'public');
    }

    // Update ID proof only if a new file is uploaded
    if ($request->hasFile('id_proof')) {
        $employee->id_proof = $request->file('id_proof')->store('id_proofs', 'public');
    }

    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
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
