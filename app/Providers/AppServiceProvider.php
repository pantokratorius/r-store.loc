<?php

namespace App\Providers;

use App\View\Composers\CartDataComposer;
use App\View\Composers\ImagesDataComposer;
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
        view()->composer(['layout', 'cart'], CartDataComposer::class );
        view()->composer('*', ImagesDataComposer::class );
    }

}
