@extends('layputs.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name}}" required>
        </div>
        <div class="form-group">
            <label for="user_role_id">Role</label>
            <select name="user_role_id" id="user_role_id" class="form-control">
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ $role->id == $user->user_role_id ? 'selected' : }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection