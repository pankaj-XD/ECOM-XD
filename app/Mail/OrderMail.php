<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order_number;
    protected $item_count;
    protected $total;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_number, $item_count, $total)
    {
        $this->order_number = $order_number;
        $this->item_count = $item_count;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.OrderMail',[
            'order_number' => $this->order_number,
            'item_count' => $this->item_count,
            'total' => $this->total,
        ]);
    }
}
