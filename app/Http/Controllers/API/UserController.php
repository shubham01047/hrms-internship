<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // List all users (admin only)
    public function index(Request $request)
    {
        if (!$request->user()->hasRole('Admin')) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return User::whereNull('deleted_at')->get();
    }

    // View user profile
    public function show($id)
    {
        $user = User::where('id', $id)->whereNull('deleted_at')->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // Create new user (admin only)
    public function store(Request $request)
    {
        if (!$request->user()->hasRole('Admin')) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json($user, 201);
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->whereNull('deleted_at')->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        if (isset($validated['name'])) $user->name = $validated['name'];
        if (isset($validated['email'])) $user->email = $validated['email'];
        if (isset($validated['password'])) $user->password = Hash::make($validated['password']);

        $user->save();

        return response()->json($user);
    }

    // Soft delete user
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user || $user->deleted_at) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->deleted_at = now();
        $user->save();

        return response()->json(['message' => 'User soft-deleted']);
    }
}
