<?php

namespace App\Mail\Course\Slot;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UpdateSlot extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $user;
    public $course;
    public $slot;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {  
        $this->data = $data;
        $this->user = $data->users;
        $this->course = $data->courses;
        $this->slot = $data->slot;



    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
           subject: $this->course['name'].' Update Alert 🚨'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'front-app.mails.update_slot',
            with: [
                'course_name' => $this->course['name'],
                'start_date' => $this->slot['date'],
                'start_time' => $this->slot['start_time'],
                'user_name'=>$this->user['name']
   
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
