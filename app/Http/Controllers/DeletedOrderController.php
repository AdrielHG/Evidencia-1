<?php

namespace App\Http\Controllers;

use App\Models\DeletedOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class DeletedOrderController extends Controller
{
    public function index()
    {
        $deletedOrders = DeletedOrder::with('order')->get();
        return view('deleted-orders.index', compact('deletedOrders'));
    }

    public function restore($id)
    {
        $deletedOrder = DeletedOrder::find($id);
        if ($deletedOrder) {
            $deletedOrder->restoreOrder();
            return redirect()->route('deleted-orders.index')->with('success', 'Order restored successfully');
        }

        return redirect()->route('deleted-orders.index')->with('error', 'Order not found');
    }
}
