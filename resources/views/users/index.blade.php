@extends('layouts.bootstrap')

@section('title', 'User Details')

@section('content')

    <h1>Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">See user</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection