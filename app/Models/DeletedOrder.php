<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedOrder extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'deleted_at'];

    /**
     * Get the order that was deleted.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Restore a logically deleted order.
     */
    public function restoreOrder()
    {
        // Logic to restore order goes here
    }
}
