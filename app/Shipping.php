<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'shipLine1', 'shipLine2', 'shipCity', 'shipState', 'shipZip'
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function orders() {
        return $this->hasMany('App\Order');
    }
}
