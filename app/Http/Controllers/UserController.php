<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::orderBy('name', 'ASC')->paginate(10);
        return view('backend.users.index', compact('users'));
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
        //
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
        $user = User::find($id);
        $roles = Role::all();
        $userHasRoles = $user->roles->pluck('id')->first();
        // dd($userHasRoles);


        // Pass the user to the view for editing
        return view('backend.users.edit', compact('user','roles', 'userHasRoles'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // dd($request->all());

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,'.$id,
            'email' => 'required|email|unique:users,email,'. $id .',id',
            'role' => 'required',
        ]);

        // Update the permission
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Assign the role to the user
        $role = Role::findById($request->role);
        // dd($role);
        $user->syncRoles($role->id);


        // Redirect to the permission index page
        return redirect()->route('users.index')->with('success','User role has been updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
