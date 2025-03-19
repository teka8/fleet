<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:manage_permissions', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        $permissions = Permission::paginate(10);
        // $permissions = Permission::orderBy('id', 'DESC')->paginate(10)->onEachSide(1);

        return view('pages.permission.index', compact('permissions'));
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
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);
        try {
            Permission::create(['name' => $request->input('name')]);
            Toastr::success('Permission created successfully :)', 'Success');
            return redirect()->route('permission.index');
        } catch (\Exception $e) {
            return redirect()->route('permission.index');
            Toastr::success('Add new permission fail :)', 'Error');
        }

    }



    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Permission $permission)
    // {
    //     //
    // }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
        Toastr::success('Permission Updated successfully :)', 'Success');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Permission $permission)
    // {
    //     //
    // }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        Toastr::success('Permission Deleted successfully :)', 'Success');
        return redirect()->route('permission.index');
    }
}
