@extends('layouts.bootstrap')

@section('title', 'Customer Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Customer Details</h3>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $customer->name }}</p>
            <p><strong>Customer Number:</strong> {{ $customer->customer_number }}</p>
            <p><strong>Contact Info:</strong> {{ $customer->contact_info }}</p>
        </div>
    </div>
    <br>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
@endsection
