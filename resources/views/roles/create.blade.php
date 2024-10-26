<h1>Create Role</h1>

<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Role Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter role name" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Role</button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to Roles</a>
</form>