<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class UpdateUserLoginStatus
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    
    public function handle($event)
    {
        if ($event instanceof Login) {
            $event->user->is_logged_in = true;
        } elseif ($event instanceof Logout) {
            $event->user->is_logged_in = false;
        }
        $event->user->save();
    }
}
