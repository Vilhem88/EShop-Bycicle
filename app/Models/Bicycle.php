<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "image_path",
        "type_id",
        "brand",
        "model",
        "frame_size",
        "gender_id",
        "year",
        "quantity",
        "on_sale",
        "price"
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
