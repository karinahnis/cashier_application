<?php

namespace App\Http\Controllers;

use App\Models\User_Role;
use Illuminate\Http\Request;


class UserRoleController extends Controller {
    public function index() {
        $roles = User_Role::all();
        return view('user_roles.index', compact('roles'));
    }

    public function create() {
        return view('user_roles.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        User_Role::create($validated);

        return redirect()->route('user_roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(User_Role $userRole) {
        return view('user_roles.edit', compact('userRole'));
    }

    public function update(Request $request, User_Role $userRole) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userRole->update($validated);

        return redirect()->route('user_roles.index')->with('success', 'ROle updated successfully.');
    }
    
    public function destroy(User_Role $userRole) {
        $userRole->delete();

        return redirect()->route('user_roles.index')->with('success', 'ROle deleted successfully.');
    }
}