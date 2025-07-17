<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of Roles.
     */
    public function index() {
        $roles = Role::orderBy('name','ASC')->paginate(10);
        return view('roles.listroles',[
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a Role page.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();

        return view('roles.create', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created Role in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3'
        ]);
        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);
            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return redirect()->route('roles.index')->with('success', 'Role added sucessfully');
        } else {
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified Role.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
