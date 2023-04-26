<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "order_id",
        "bicycle_id",
        "quantity",
        "price",
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function bicycle()
    {
        return $this->belongsTo(Bicycle::class);
    }


}
