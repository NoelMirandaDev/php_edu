<?php

namespace App\Providers;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Gate::define('update-event', function ($user, Event $event) {
        //     return $user->id === $event->user_id;
        // });

        // Gate::define('delete-attendee', function ($user, Event $event, Attendee $attendee) {
        //     return $user->id === $attendee->user_id
        //     || $user->id === $event->user_id;
        // });
    }
}
