<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionConrtoller extends Controller
{
    /**
     * Display Permissions Page.
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(10);
        return view('permissions.listpermissions', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating Permission Page.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in Permission Database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:4'
        ]);
        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission added sucessfully');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Show the form for editing the Permission Page.
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified Permission in storage.
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|unique:permissions,name,' . $id . ',id'
        ]);
        if ($validator->passes()) {

            $permission->name = $request->name;
            $permission->save();
            return redirect()->route('permissions.index')->with('success', 'Permission updated sucessfully');
        } else {
            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Deletes the specified Permission from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $permission = Permission::findOrFail($id);
        if ($permission == null) {
            session()->flash('error', 'Permission not found.');
            return response()->json([
                'status' => false
            ]);
        }
        $permission->delete();
        session()->flash('success', 'Permission deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
}
