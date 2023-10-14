<?php

namespace App\Providers;

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
        view()->composer('components.herosection', function ($view) {
            $view->with('slides', scandir("/home/kali/Desktop/Projects/Ihaknas/storage/app/public/slideshow"));
        });
    }
}
