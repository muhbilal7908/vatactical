<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailCompose extends Mailable
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
            return $this->from('info@vatactical.com', 'Vatactical')
                        ->subject($this->data['subject']) // Access subject from $this->data array
                        ->view('front-app.mails.email_compose')
                        ->with('data', $this->data);
        }
    }
