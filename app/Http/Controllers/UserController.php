<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:App\Models\User,username',
            'password' => 'required|string|min:8',
            'email'    => 'required|string|max:250|unique:App\Models\User,email',
            'role_id' => 'required|exists:App\Models\Role,id',
        ]);

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'email'    => $validated['email'],
            'role_id' => $validated['role_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:App\Models\User,username,' . $user->id,
            'email'    => 'required|string|max:250|unique:App\Models\User,email,' . $user->id,
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:App\Models\Role,id',
        ]);

        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
