<?php

namespace App\Listeners;

use App\Events\NewPost;
use App\Mail\NewPostMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        $event->post->author->subscribers->each(function ($subscriber) use ($event) {
            Mail::to($subscriber->email)->send(new NewPostMail($event->post));
        });;
    }
}
