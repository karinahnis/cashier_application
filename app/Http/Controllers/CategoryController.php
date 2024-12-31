<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        category::create($validated);

        return redirect()->route('categories.index')->with('success', 'category created successfully.');
    }

    public function edit(Category $category) {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category update successfully.');
    }

    public function destroy(Category $category) {
        $category->delete();

        return redirect()->route('categories.index'->with('success', 'Category destroy successfully.'));
    }
}