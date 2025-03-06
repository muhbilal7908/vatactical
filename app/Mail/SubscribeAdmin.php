<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscribeAdmin extends Mailable
{
    use Queueable, SerializesModels;
    private $data=[];

    public $alldata;
    public $course_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alldata, $course_name)
    {
        $this->alldata = $alldata;
        $this->course_name = $course_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@Vatactical.com', 'Vatactical')
                    ->subject('New Course Has Been Subscribed')
                    ->view('front-app.mails.SubscribeAdmin');
    }
}
