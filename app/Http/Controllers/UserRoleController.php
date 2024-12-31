<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller {
    public function index() {
        $roles = UserRole::all();
        return view('user_roles.index', compact('roles'));
    }

    public function create() {
        return view('user_roles.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        UserRole::create($calidated);

        return redirect()->route('user_roles.index'->with('success', 'Role created successfully.'));
    }

    public function edit(UserRole $userRole) {
        return view('user_roles.edit', compact('userRole'));
    }

    public function update(Request $request, UserRole $userRole) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userRole->update($validated);

        return redirect()->route('user_roles.index')->with('success', 'ROle updated successfully.');
    }
    
    public function destroy(UserRole $userRole) {
        $userRole->delete();

        return redirect()->route('user_roles.index')->with('success', 'ROle deleted successfully.');
    }
}