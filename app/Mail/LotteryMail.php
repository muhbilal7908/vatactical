<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LotteryMail extends Mailable
{
    use Queueable, SerializesModels;
    private $data=[];

    public $order;

    public $Lotteris_count;

    public $Lotteris;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$Lotteris_count,$Lotteris)
    {
        $this->order = $order;
        $this->Lotteris_count=$Lotteris_count;
        $this->Lotteris=$Lotteris;

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
                    ->view('front-app.mails.lottery');
    }
}
