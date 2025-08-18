<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleApiController extends Controller
{
    /**
     * Get all roles
     */
    public function index()
    {
        $roles = Role::with('permissions')->orderBy('id', 'DESC')->get();
        return response()->json($roles);
    }

    /**
     * Store a new role
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required' 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web' 
        ]);

        if (!empty($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }

        return response()->json([
            'status' => true,
            'message' => 'Role created successfully',
            'data' => $role
        ]);
    }

    /**
     * Update an existing role
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role->update([
            'name' => $request->name,
            'guard_name' => 'web' 
        ]);

        if (!empty($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }

        return response()->json([
            'status' => true,
            'message' => 'Role updated successfully',
            'data' => $role
        ]);
    }

    /**
     * Delete a role
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'status' => false,
                'message' => 'Role not found'
            ], 404);
        }

        $role->delete();

        return response()->json([
            'status' => true,
            'message' => 'Role deleted successfully'
        ]);
    }
}
