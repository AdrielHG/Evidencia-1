@extends('layouts.bootstrap')

@section('title', 'Customer Details')

@section('content')
<h1>Customers</h1>
<a href="{{ route('customers.create') }}" class="btn btn-primary">Create New Customer</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Number</th>
            <th>Name</th>
            <th>Contact Info</th>
            <th>Actions</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->customer_number }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->contact_info }}</td>
                <td>
                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">See Customer</a>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                        style="display:inline-block;">
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