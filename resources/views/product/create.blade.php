@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Produk</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf 
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class=""form-label>Kategori</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $Category )
                        <option value="{{ $Category->id }}"> {{ $Category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="stock_available" class=""form-label>Stok</label>
                <input type="number" name="stock_available" id="stock_available" class="form-ccontrol" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection