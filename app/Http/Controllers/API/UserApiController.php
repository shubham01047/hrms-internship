<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserApiController extends Controller
{
    /**
     * List all users (paginated).
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return response()->json($users);
    }

    /**
     * Store new user.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required|min:3',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:6|same:confirm_password',
            'confirm_password'  => 'required',
            'gender'            => 'nullable|string',
            'date_of_birth'     => 'nullable|date',
            'contact_number'    => 'nullable|string|max:20',
            'address'           => 'nullable|string',
            'city'              => 'nullable|string',
            'state'             => 'nullable|string',
            'country'           => 'nullable|string',
            'pin_code'          => 'nullable|string|max:10',
            'joining_date'      => 'nullable|date',
            'employment_type'   => 'nullable|string',
            'status'            => 'nullable|string',
            'leave_balance'     => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $user = new User();
        $user->fill($request->except(['password', 'confirm_password', 'role']));
        $user->password = Hash::make($request->password);

        // File uploads
        if ($request->hasFile('resume')) {
            $user->resume = $request->file('resume')->store('uploads/resumes', 'public');
        }
        if ($request->hasFile('aadhar_card')) {
            $user->aadhar_card = $request->file('aadhar_card')->store('uploads/aadhar', 'public');
        }
        if ($request->hasFile('pan_card')) {
            $user->pan_card = $request->file('pan_card')->store('uploads/pan', 'public');
        }

        $user->save();

        if ($request->has('role')) {
            $user->syncRoles($request->role);
        }

        return response()->json([
            'status'  => true,
            'message' => 'User created successfully.',
            'data'    => $user
        ], 201);
    }

    /**
     * Show specific user.
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    /**
     * Update user.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'              => 'required|min:3',
            'email'             => 'required|email|unique:users,email,' . $id,
            'gender'            => 'nullable|string',
            'date_of_birth'     => 'nullable|date',
            'contact_number'    => 'nullable|string|max:20',
            'address'           => 'nullable|string',
            'city'              => 'nullable|string',
            'state'             => 'nullable|string',
            'country'           => 'nullable|string',
            'pin_code'          => 'nullable|string|max:10',
            'joining_date'      => 'nullable|date',
            'employment_type'   => 'nullable|string',
            'status'            => 'nullable|string',
            'leave_balance'     => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $user->fill($request->except(['password', 'role']));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // File uploads
        if ($request->hasFile('resume')) {
            $user->resume = $request->file('resume')->store('uploads/resumes', 'public');
        }
        if ($request->hasFile('aadhar_card')) {
            $user->aadhar_card = $request->file('aadhar_card')->store('uploads/aadhar', 'public');
        }
        if ($request->hasFile('pan_card')) {
            $user->pan_card = $request->file('pan_card')->store('uploads/pan', 'public');
        }

        $user->save();

        if ($request->has('role')) {
            $user->syncRoles($request->role);
        }

        return response()->json([
            'status'  => true,
            'message' => 'User updated successfully.',
            'data'    => $user
        ]);
    }

    /**
     * Delete user.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json([
            'status'  => true,
            'message' => 'User deleted successfully.'
        ]);
    }
}
