<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Course\Slots\UpdateSlot;
use App\Mail\Course\Slot\UpdateSlot as SlotUpdateSlot;
use App\Models\CourseSubscribe;
use Illuminate\Support\Facades\Mail;

class NotifySlot
{
    /**
     * Create the event listener.
     */

 
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateSlot $event): void
    {
        
        $subscribers=CourseSubscribe::where('session_id',$event->data->id)->get();
        if($subscribers){
            foreach ($subscribers as $value) {
                Mail::to($value['email'])->send(new SlotUpdateSlot($value));
            }
        }
       
        
    }
}
