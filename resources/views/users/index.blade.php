@extends('layout.app')

@section('content')
<div class="container">
    <h1>Users</h1> 
    <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>   
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->userRole->name }}</td>
                <td>
                    <a href="{{ route('user.edit', $user) }}" class"btn btn-warning>Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display::inline;">
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
