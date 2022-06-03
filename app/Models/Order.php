<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'status',
        'message',
        'tracking',
        'total',
    ];
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
