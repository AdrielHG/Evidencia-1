@extends('layouts.bootstrap')

@section('title', 'Order Details')

@section('content')
<h1>Orders</h1>
<a href="{{ route('orders.create') }}" class="btn btn-primary">Create New Order</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Invoice Number</th>
            <th>Fiscal Data</th>
            <th>Customer</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Actions</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->invoice_number }}</td>
                <td>{{ $order->fiscal_data }}</td>
                <td>{{ $order->customer->name ?? 'N/A' }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->order_status }}</td>
                <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">See order</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
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