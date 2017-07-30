<?php

namespace App\Listeners;

use App\Events\EventRegister;
use App\Mail\Welcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EventRegisterListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event. send email after registration
     *
     * @param  EventRegister $event
     * @return void
     */
    public function handle(EventRegister $event)
    {
        Mail::to($event->user)->send(new Welcome());
    }
}
