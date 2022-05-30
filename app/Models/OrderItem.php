<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table='order_items';
    protected $fillable=[
            'order_id',
            'prod_id',
            'qty',
            'price',
    ];
    function orders(){
        return $this->belongsTo(Order::class, 'order_id');
    }
    function products(){
        return $this->belongsTo(Product::class, 'prod_id');
    }
}
