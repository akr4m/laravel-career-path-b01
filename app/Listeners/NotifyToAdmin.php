<?php

namespace App\Listeners;

use App\Events\UserRegistered;

class NotifyToAdmin
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
        info('Admin notified about new user: '.$event->user->email);
    }
}
