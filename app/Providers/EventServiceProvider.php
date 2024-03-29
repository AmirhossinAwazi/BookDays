<?php

namespace App\Providers;

use App\Events\NewComment;
use App\Events\NewPost;
use App\Listeners\NotifyAuthorAboutNewComment;
use App\Listeners\NotifySubscribersAboutNewPost;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewComment::class => [
            NotifyAuthorAboutNewComment::class,
        ],

        NewPost::class => [
            NotifySubscribersAboutNewPost::class,
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
