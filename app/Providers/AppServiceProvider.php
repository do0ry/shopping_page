<?php

namespace App\Providers;

use App\Http\Livewire\CartContents;
use Illuminate\Support\ServiceProvider;
use Platform\Contracts\CookieContract;
use Platform\Services\CartService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Platform\Contracts\CookieContract',function (){
            return new CartService('cart');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
