<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LotteryWinner extends Mailable
{
    use Queueable, SerializesModels;
    private $data=[];

    public $order;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;

    }

    /**

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@Vatactical.com', 'Vatactical')
                    ->subject('Your Ticket Confirmation')
                    ->view('front-app.mails.lottery_winner');
    }
}
