<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
// use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */

    function __construct()
    {
        $this->middleware('permission:manage_users', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        // Fetch users with pagination
        $users = User::paginate(10);
        $roles = Role::all();
        return view('pages.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create'); // Show the create user form
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,id',

        ]);

        // Save the new user
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'] ?? null,
            'last_name' => $validatedData['last_name'] ?? null,
            'phone_number' => $validatedData['phone_number'] ?? null,
            'email' => $validatedData['email'],
            // 'address' => $request['address'],
            'address' => $request->input('address'),
            'password' => Hash::make($validatedData['password']),
            'join_date' => now(),
            'status' => 'active',

        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $user->first_name . '_photo' . '_' . time() . '.' . $request->photo->extension();
            $image->storeAs('public/user_data', $imageName);
            $user->photo = 'storage/user_data/' . $imageName;
            $user->save();
        }


        $role = Role::find($validatedData['role']);
        if ($role) {
            $user->syncRoles([$role->id]); // Synchronize user roles
        } else {
            return redirect()->back()->with('error', 'Invalid role.');
        }

        Toastr::success('User created successfully :)', 'Success'); // Ensure Toastr is properly set up
        return redirect()->route('users.index')->with('success', 'User created successfully!');

    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        $users = User::all();
        return view('users.show', compact('users')); // Show user details
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user')); // Show the edit form
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:roles,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update user details
        $user->update([
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'] ?? $user->middle_name,
            'last_name' => $validatedData['last_name'] ?? $user->last_name,
            'phone_number' => $validatedData['phone_number'] ?? $user->phone_number,
            'email' => $validatedData['email'],
            'address' => $request['address'],
            'password' => $validatedData['password']
                ? Hash::make($validatedData['password'])
                : $user->password,
        ]);
        if ($request->hasFile('photo')) {
            $this->deleteOldPhoto($user->photo);
            $imageName = $user->first_name . '_photo_' . time() . '.' . $request->photo->extension();
            $path = $request->file('photo')->storeAs('public/user_data', $imageName);
            $user->photo = 'storage/user_data/' . $imageName;
            $user->save();
        }
        $role = Role::find($validatedData['role']);
        $user->syncRoles([$role->id]);
        Toastr::success('User Updated successfully :)', 'Success');
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    protected function deleteOldPhoto($photoPath)
    {
        if ($photoPath && \Storage::exists($photoPath)) {
            \Storage::delete($photoPath);
        }
    }

    /**
     * Remove the specified user from storage.
     */
    // public function destroy(User $user)
    // {
    //     $user->delete(); // Delete the user
    //     return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    // }
    public function destroy(User $user)
    {
        try {
            $user->delete(); // Delete the user

            Toastr::success('User Deleted successfully :)', 'Success');
            return redirect()->route('users.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {

            Toastr::success('User Not Deleted successfully :)', 'Error');
            return redirect()->route('users.index')->with('error', 'An error occurred while deleting the user.');
        }
    }

}
