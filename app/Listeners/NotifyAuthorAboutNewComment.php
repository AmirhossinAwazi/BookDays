<?php

namespace App\Listeners;

use App\Events\NewComment;
use App\Notifications\NewCommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAuthorAboutNewComment
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
    public function handle(NewComment $event): void
    {
        $event->comment->post->author->notify(new NewCommentNotification);
    }
}
