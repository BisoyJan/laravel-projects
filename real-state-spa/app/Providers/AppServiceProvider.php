<?php

namespace App\Providers;

use Gate;
use App\Policies\NotificationPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\DatabaseNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(
            DatabaseNotification::class,
            NotificationPolicy::class
        );
    }
}
