<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        $user = User::with('userRole')->get();
        return view('users.index', compact('user'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_role_id' => 'required|exists:user_roles,id',
        ]);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name' => 'required|string|max|255',
            'user_role_id' => 'required|exists:user_role,id',
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}