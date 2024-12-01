@extends('layouts.bootstrap')

@section('title', 'Customer Details')

@section('content')

<h1>Create Customer</h1>

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="customer_number">Customer Number</label>
        <input type="text" name="customer_number" class="form-control" id="customer_number" required>
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" required>
    </div>

    <div class="form-group">
        <label for="contact_info">Contact Info</label>
        <input type="text" name="contact_info" class="form-control" id="contact_info" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Customer</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
</form>
@endsection