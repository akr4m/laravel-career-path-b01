<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        Mail::raw('Welcome to our platform, '.$event->user->name.'!', function ($message) use ($event) {
            $message->to($event->user->email)
                ->subject('Welcome to Our Platform');
        });
    }
}
