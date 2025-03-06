<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Login extends Mailable
    {
        use Queueable, SerializesModels;
        private $data=[];
        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($data)
        {
            $this->data=$data;
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {

            return $this->subject('Logged In')->view('front-app.mails.login',['data'=>$this->data]);
        }
    }
