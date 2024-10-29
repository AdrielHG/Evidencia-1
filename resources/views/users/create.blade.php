<h1>Create User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
    </div>

    <div class="form-group">
        <label for="role_id">Role</label>
        <select name="role_id" id="role_id" class="form-control" required>
            <option value="">Select Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create User</button>
</form>