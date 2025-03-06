<?php

namespace App\Observers;

use App\Models\Slots;
use App\Events\Course\Slots\UpdateSlot;
class SlotObserver
{
    /**
     * Handle the Slots "created" event.
     */
    public function created(Slots $slots): void
    {
        //
    }

    /**
     * Handle the Slots "updated" event.
     */
    public function updated(Slots $slots): void
    {
       
        if($slots){
            event(new UpdateSlot($slots));
        }
       
}

    /**
     * Handle the Slots "deleted" event.
     */
    public function deleted(Slots $slots): void
    {
        //
    }

    /**
     * Handle the Slots "restored" event.
     */
    public function restored(Slots $slots): void
    {
        //
    }

    /**
     * Handle the Slots "force deleted" event.
     */
    public function forceDeleted(Slots $slots): void
    {
        //
    }
}
