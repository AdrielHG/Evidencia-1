<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'status', 'status_changed_at'];

    /**
     * Get the order that this status history belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
