<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index(Request $request) {
         $products = Product::with('Category')->get();
         return view('product.index', compact('products'));
    }


    public function create() {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock_available' => 'required|integer|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    
    public function edit(Product $product) {
        $categories = Category::all(); 
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock_available' => 'required|integer|min:0',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product update successfully.');
    }
    
    public function destroy(Product $product) {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product delete successfully.');
    }
}