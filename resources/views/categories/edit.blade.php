@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="form-group">
            <label for="name"> Nama Kategori</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
    </form>
    <button type="submit" class="btn btn-success mt-3">Update </button>
</div>
@endsection