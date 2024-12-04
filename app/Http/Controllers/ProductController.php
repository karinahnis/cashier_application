<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Model\Transaction;

class ProductController extends Controller {
    public function index() {
        // Mengambil semua produk beserta transaksi terkait 
        $product = Product::with('transaction')->get();

        // Mengirim data ke view
        return view('product.index', ['product' => $product]);
    }

    public function addProduct(Request $request) {
        // validasi data
        $validated = $ $request->validated([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok_tersedia' => 'required|integer',
        ]);

        // Simpan produk baru
        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'produk berhasil ditambahkan!');
    }

}
