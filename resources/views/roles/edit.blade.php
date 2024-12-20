@extends('layouts.bootstrap')

@section('title', 'Roles Details')

@section('content')

<h1>Edit Role</h1>

<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Role Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Role</button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to Roles</a>
</form>
@endsection