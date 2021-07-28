<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactioMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $t_id;
    protected $amount;
    protected $currency;
    protected $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($t_id, $amount, $currency, $status )
    {
        $this->t_id = $t_id;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.TransactioMail',[
            "tid" => $this->t_id,
            "amount" => $this->amount,
            "currency" => $this->currency,
            "status" => $this->status
        ]);
    }
}
