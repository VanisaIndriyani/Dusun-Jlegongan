<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Content;

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
        view()->composer('layouts.frontend', function ($view) {
            $kontak = Content::where('type', 'kontak')->first();
            $view->with('kontakGlobal', $kontak);
        });
    }
}
