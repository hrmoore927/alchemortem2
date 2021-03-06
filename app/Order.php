<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
//    order fields to be stored
    protected $fillable = [
        'user_id', 'custName', 'shipLine1', 'shipLine2', 'shipCity', 'shipState', 'shipZip', 'orderDate', 'shipDate', 'orderStatus', 'cart', 'payment_id'
    ];
    
//    users can have many orders
    public function user() {
        return $this->belongsTo('App\User');
    }
}
