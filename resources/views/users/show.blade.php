@extends('layouts.bootstrap')

@section('title', 'User Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>User Details</h3>
        </div>
        <div class="card-body">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role->name }}</p>
        </div>
    </div>

    <br>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
@endsection
