<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "firstName",
        "lastName",
        "email",
        "phone",
        "address", 
        "totalPrice",
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
