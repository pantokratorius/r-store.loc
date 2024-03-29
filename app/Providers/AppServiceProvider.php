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
        if(app()->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
        view()->composer(['frontend.layout', 'frontend.cart', 'frontend.order'], CartDataComposer::class );
    }

}
