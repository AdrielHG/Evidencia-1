<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'invoice_number',
        'fiscal_data',
        'order_date',
        'delivery_address',
        'notes',
        'order_status',
        'route_photo',
        'delivery_photo',
    ];

    /**
     * Get the customer that owns the order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the user (salesperson) who created the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the status history of the order (if status tracking is enabled).
     */
    public function statusHistory()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }
}
