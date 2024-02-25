<?php

namespace App\Listeners;

use App\Events\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifySubscribersAboutNewPost
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
    public function handle(NewPost $event): void
    {
        dd('im in the listener');
    }
}
