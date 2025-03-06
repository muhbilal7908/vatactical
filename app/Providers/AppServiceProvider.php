<?php

namespace App\Providers;

use App\Models\Slots;
use App\Observers\SlotObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Slots::observe(SlotObserver::class);
        Paginator::useBootstrap();

    }
}
