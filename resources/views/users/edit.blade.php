@extends('layouts.bootstrap')

@section('title', 'User Details')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
    </div>
    
    <div class="form-group">
        <label for="role_id">Role</label>
        <select name="role_id" id="role_id" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
</form>
@endsection