<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypesApiController extends Controller
{

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => LeaveType::all()
        ], 200);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $leaveType = LeaveType::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Leave Type created successfully.',
            'data' => $leaveType
        ], 201);
    }
    public function show($id)
    {
        $leaveType = LeaveType::find($id);

        if (!$leaveType) {
            return response()->json([
                'success' => false,
                'message' => 'Leave Type not found.'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $leaveType
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $leaveType = LeaveType::find($id);

        if (!$leaveType) {
            return response()->json([
                'success' => false,
                'message' => 'Leave Type not found.'
            ], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $leaveType->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Leave Type updated successfully.',
            'data' => $leaveType
        ], 200);
    }
    public function destroy($id)
    {
        $leaveType = LeaveType::find($id);
        if (!$leaveType) {
            return response()->json([
                'success' => false,
                'message' => 'Leave Type not found.'
            ], 404);
        }
        $leaveType->delete();
        return response()->json([
            'success' => true,
            'message' => 'Leave Type deleted successfully.'
        ], 200);
    }
}
