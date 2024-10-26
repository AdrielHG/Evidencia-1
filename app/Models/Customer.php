<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['customer_number', 'name', 'contact_info'];

    /**
     * Get the orders placed by the customer.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
