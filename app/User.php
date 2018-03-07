<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
    
    public function updateTicket($data)
    {
        $user = $this->find($data['id']);
        $user->fName = $data['fName'];
        $user->lName = $data['lName'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->save();
        return 1;
    }
}
