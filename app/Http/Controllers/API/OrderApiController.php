<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    // Retrieve all orders
    public function index()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    // Search for an order by customer_id and invoice_number
    public function show($customer_id, $invoice_number)
{
    $order = Order::where('customer_id', $customer_id)
                  ->where('invoice_number', $invoice_number)
                  ->first();

    if (!$order) {
        return response()->json([
            'message' => 'Order not found'
        ], 404);
    }

    return response()->json($order);
}


}
