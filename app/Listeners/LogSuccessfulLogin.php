<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth ;
class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if (Auth::guard('user')->user()) {
            $event->user->contractorLastLogin = date('Y-m-d H:i:s');
            $event->user->save();
        }

        else if (Auth::guard('admin')->user()) {
            $event->user->adminLastLogin = date('Y-m-d H:i:s') ;
            $event->user->save() ;
        }
        
    }
}
