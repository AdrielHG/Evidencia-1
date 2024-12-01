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

        Order::create([
            'customer_id' => $request->customer_id,
            'invoice_number' => $request->invoice_number,
            'fiscal_data'   => $request->fiscal_data,
            'order_date' => $request->order_date,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
            'order_status' => $request->order_status,
        ]);
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function show($id)
    {
        $order = Order::with(['customer'])->findOrFail($id); // Include relations if applicable
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        $order->update([
            'customer_id' => $request->customer_id,
            'invoice_number' => $request->invoice_number,
            'fiscal_data' => $request->fiscal_data,
            'order_date' => $request->order_date,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
            'order_status' => $request->order_status,
        
        ]);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
