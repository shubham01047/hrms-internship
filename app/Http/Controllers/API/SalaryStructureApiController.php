<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SalaryStructure;
use Illuminate\Http\Request;

class SalaryStructureApiController extends Controller
{
    public function index()
    {
        $salaryStructures = SalaryStructure::with('user')->get();
        return response()->json([
            'success' => true,
            'data' => $salaryStructures
        ]);
    }
    public function show($id)
    {
        $salaryStructure = SalaryStructure::with('user')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $salaryStructure
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'basic' => 'required|numeric|min:0',
            'hra' => 'nullable|numeric|min:0',
            'allowances' => 'nullable|numeric|min:0',
            'tax' => 'nullable|numeric|min:0',
            'pf' => 'nullable|numeric|min:0',
            'esi' => 'nullable|numeric|min:0',
        ]);
        $salaryStructure = SalaryStructure::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Salary structure created successfully',
            'data' => $salaryStructure->load('user')
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $salaryStructure = SalaryStructure::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'basic' => 'nullable|numeric|min:0',
            'hra' => 'nullable|numeric|min:0',
            'allowances' => 'nullable|numeric|min:0',
            'tax' => 'nullable|numeric|min:0',
            'pf' => 'nullable|numeric|min:0',
            'esi' => 'nullable|numeric|min:0',
        ]);
        $salaryStructure->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Salary structure updated successfully',
            'data' => $salaryStructure->load('user')
        ]);
    }
    public function destroy($id)
    {
        $salaryStructure = SalaryStructure::findOrFail($id);
        $salaryStructure->delete();
        return response()->json([
            'success' => true,
            'message' => 'Salary structure deleted successfully'
        ]);
    }
}
