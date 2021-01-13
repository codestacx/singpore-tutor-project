<?php

namespace App\Listeners;

use App\Events\EmailVerification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailVerificationListener
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
     * Handle the event.
     *
     * @param  EmailVerification  $event
     * @return void
     */
    public function handle(EmailVerification $event)
    {
        Mail::to($event->email)->send(new \App\Mail\EmailVerification($event->token));
    }
}
