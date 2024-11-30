<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response()->json($orders);
    }

    public function show($id){
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);    
        }

        return response()->json($order);
    }
}
