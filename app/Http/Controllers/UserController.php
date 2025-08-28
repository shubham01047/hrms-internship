<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view users', only: ['index']),
            new Middleware('permission:edit users', only: ['edit', 'update']),
            new Middleware('permission:create users', only: ['create', 'store']),
            new Middleware('permission:delete users', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('users.listusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'pin_code' => 'nullable|string|max:10',
            'joining_date' => 'nullable|date',
            'employment_type' => 'nullable|string',
            'status' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'aadhar_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pan_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'leave_balance' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->gender = $request->gender;
        $users->date_of_birth = $request->date_of_birth;
        $users->contact_number = $request->contact_number;
        $users->address = $request->address;
        $users->city = $request->city;
        $users->state = $request->state;
        $users->country = $request->country;
        $users->pin_code = $request->pin_code;
        $users->joining_date = $request->joining_date;
        $users->employment_type = $request->employment_type;
        $users->status = $request->status;
        $users->leave_balance = $request->leave_balance;
        if ($request->hasFile('resume')) {
            $users->resume = $request->file('resume')->store('uploads/resumes', 'public');
        }
        if ($request->hasFile('aadhar_card')) {
            $users->aadhar_card = $request->file('aadhar_card')->store('uploads/aadhar', 'public');
        }
        if ($request->hasFile('pan_card')) {
            $users->pan_card = $request->file('pan_card')->store('uploads/pan', 'public');
        }
        $users->save();
        $users->syncRoles($request->role);
        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRoles = $users->roles->pluck('id');
        return view('users.edit', compact('users', 'roles', 'hasRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'pin_code' => 'nullable|string|max:10',
            'joining_date' => 'nullable|date',
            'employment_type' => 'nullable|string',
            'status' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'aadhar_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pan_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'leave_balance' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)->withInput()->withErrors($validator);
        }
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->filled('password')) {
            $users->password = Hash::make($request->password);
        }
        $users->gender = $request->gender;
        $users->date_of_birth = $request->date_of_birth;
        $users->contact_number = $request->contact_number;
        $users->address = $request->address;
        $users->city = $request->city;
        $users->state = $request->state;
        $users->country = $request->country;
        $users->pin_code = $request->pin_code;
        $users->joining_date = $request->joining_date;
        $users->employment_type = $request->employment_type;
        $users->status = $request->status;
        $users->leave_balance = $request->leave_balance;
        if ($request->hasFile('resume')) {
            $users->resume = $request->file('resume')->store('uploads/resumes', 'public');
        }
        if ($request->hasFile('aadhar_card')) {
            $users->aadhar_card = $request->file('aadhar_card')->store('uploads/aadhar', 'public');
        }
        if ($request->hasFile('pan_card')) {
            $users->pan_card = $request->file('pan_card')->store('uploads/pan', 'public');
        }
        $users->save();
        $users->syncRoles($request->role);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if ($user == null) {
            session()->flash('error', 'User not found');
            return response()->json(['status' => false]);
        }
        $user->delete(); 
        session()->flash('success', 'User moved to trash.');
        return response()->json(['status' => true]);
    }
}
