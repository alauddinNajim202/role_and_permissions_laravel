<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all permissions
        $permissions = Permission::orderBy('created_at', 'asc')->paginate(8);
        // Pass the permissions to the view for display
        return view('backend.permission.index', compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',

        ]);


        // Create a new permission
        $permission = Permission::create([
            'name' => $request->name,

        ]);

        // Redirect to the permission index page
        return redirect()->route('permissions.index')->with('success','Permission has been created successfully');







    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Get the permission to be edited
        $permission = Permission::findOrFail($id);
        // Pass the permission to the view for editing
        return view('backend.permission.edit', compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,'.$id,

        ]);

        // Update the permission
        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name,

        ]);

        // Redirect to the permission index page
        return redirect()->route('permissions.index')->with('success','Permission has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // Get the permission to be deleted
        $permission = Permission::findOrFail($id);
        // Delete the permission
        $permission->delete();

        // Redirect to the permission index page
        return redirect()->route('permissions.index')->with('success','Permission has been deleted successfully');
    }
}
