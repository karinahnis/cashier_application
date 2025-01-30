@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kategori</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                
                <td>
                    <a href="{{ route('categories.edit', $product) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection