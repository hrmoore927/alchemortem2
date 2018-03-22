<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fName', 'lName', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function orders() {
        return $this->hasMany('App\Order');
    }
    
    public function shipping() {
        return $this->hasMany('App\Shipping');
    }
    
    public function sendPasswordResetNotification($token) {
        $this->notify(new Notifications\UserResetPasswordNotification($token));
    }
}
