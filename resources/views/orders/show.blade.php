@extends('layouts.bootstrap')

@section('title', 'Order Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Order Details</h3>
        </div>
        <div class="card-body">
            <p><strong>Invoice Number:</strong> {{ $order->invoice_number }}</p>
            <p><strong>Customer Name:</strong> {{ $order->customer->name }}</p>
            <p><strong>Customer ID:</strong> {{ $order->customer->id }}</p>
            <p><strong>Order Status:</strong> {{ $order->order_status }}</p>
            <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
            <p><strong>Notes:</strong> {{ $order->notes }}</p>
        </div>
    </div>
    <br>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
@endsection
