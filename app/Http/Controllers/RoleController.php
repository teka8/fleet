<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:manage_roles', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::paginate(10);
        $permission = Permission::get();

        // dd( $permission );
        return view('pages.role.index', compact('permission', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
            'permission.*' => 'exists:permissions,id',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        // $role->syncPermissions($request->input('permission')); is not working
        $role->permissions()->sync($request->input('permission'));


        Toastr::success('Role created successfully :)', 'Success');
        return redirect()->route('roles.index');

    }



    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
            'permission' => 'required|array',
            'permission.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->input('name')]);
        $role->permissions()->sync($request->input('permission'));

        Toastr::success('Role Updated successfully :)', 'Success');
        return redirect()->route('roles.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        Toastr::success('Role Deleted successfully :)', 'Success');
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully.');
    }


    // Add Permission
    public function addPermission(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);
        return response()->json(['message' => 'Permission added successfully', 'permission' => $permission]);
    }

    // Add Role with Permissions
    public function addRoleWithPermissions(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->permissions; // e.g., ['edit articles', 'delete articles']
        $role->syncPermissions($permissions);

        return response()->json(['message' => 'Role created with permissions successfully', 'role' => $role]);
    }
    // Assign Role to User
    public function assignRoleToUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->role);

        return response()->json(['message' => 'Role assigned to user successfully']);
    }
}
