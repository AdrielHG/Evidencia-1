<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_number' => 'required|string|unique:orders',
            'fiscal_data'   => 'required|string|max:255',
            'order_date' => 'required|date',
            'delivery_address' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'required|string|in:Ordered,In Process,In Route,Delivered',
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_number' => 'required|string|unique:orders,invoice_number,' . $order->id,
            'fiscal_data' => 'required|string|max:255',
            'order_date' => 'required|date',
            'delivery_address' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'required|string|in:Ordered,In Process,In Route,Delivered',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
