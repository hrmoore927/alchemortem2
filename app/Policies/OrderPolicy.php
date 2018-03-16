<?php

namespace App\Policies;

use App\User;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the odel=Order.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Order  $odel=Order
     * @return mixed
     */
    public function view(User $user,)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the odel=Order.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Order  $odel=Order
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the odel=Order.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Order  $odel=Order
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role == 'admin';
    }
}
