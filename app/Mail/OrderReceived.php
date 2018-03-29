<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
use App\User;

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order-received')->with([
            'orderName' => $this->order->custName,
            'orderNum' => $this->order->id
        ]);
    }
}
