<?php

namespace App\Observers;

use App\Models\Card;
use Illuminate\Support\Facades\Session;

class CardObserver
{
    /**
     * Handle the Card "created" event.
     */
    public function created(Card $card): void
    {
        Session::flash('message', 'This is a message!'); 
    }

    /**
     * Handle the Card "updated" event.
     */
    public function updated(Card $card): void
    {
        //
    }

    /**
     * Handle the Card "deleted" event.
     */
    public function deleted(Card $card): void
    {
        //
    }

    /**
     * Handle the Card "restored" event.
     */
    public function restored(Card $card): void
    {
        //
    }

    /**
     * Handle the Card "force deleted" event.
     */
    public function forceDeleted(Card $card): void
    {
        //
    }
}
