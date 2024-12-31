@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>
    <form action="{{ route('users.store) }}" method="POST">
        @csrf 
        <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_role_id">Role</label>
            <select id="user_role_id" name=user_role_id class="form-control">
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection