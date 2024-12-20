@extends('layouts.bootstrap')

@section('title', 'Order Details')

@section('content')

<h1>Edit Order</h1>

<form action="{{ route('orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="invoice_number">Invoice Number</label>
        <input type="text" name="invoice_number" class="form-control" id="invoice_number"
            value="{{ $order->invoice_number }}" required>
    </div>

    <div class="form-group">
        <label for="customer_id">Customer</label>
        <select name="customer_id" id="customer_id" class="form-control" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fiscal_data">Fiscal Data</label>
        <input type="text" name="fiscal_data" class="form-control" id="fiscal_data" 
            value="{{ $order->fiscal_data }}" required>
    </div>

    <div class="form-group">
        <label for="order_date">Order Date</label>
        <input type="datetime-local" name="order_date" class="form-control" id="order_date" value="{{ $order->order_date }}"
            required>
    </div>

    <div class="form-group">
        <label for="delivery_address">Delivery Address</label>
        <input type="text" name="delivery_address" class="form-control" id="delivery_address"
            value="{{ $order->delivery_address }}" required>
    </div>

    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea name="notes" id="notes" class="form-control">{{ $order->notes }}</textarea>
    </div>

    <div class="form-group">
        <label for="order_status">Order Status</label>
        <select name="order_status" id="order_status" class="form-control" required>
            <option value="Ordered" {{ $order->order_status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
            <option value="In process" {{ $order->order_status == 'In process' ? 'selected' : '' }}>In process</option>
            <option value="In route" {{ $order->order_status == 'In route' ? 'selected' : '' }}>In route</option>
            <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Order</button>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</form>
@endsection