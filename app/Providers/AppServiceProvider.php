<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
                // Force HTTPS in production
                if($this->app->environment('production')) {
                    URL::forceScheme('https');
                }
                
                // Disable Vite - add this line
                // if (!file_exists(public_path('build/manifest.json'))) {
                //     \Illuminate\Foundation\Vite::useBuildDirectory('build');
                // }
        
    }
}
