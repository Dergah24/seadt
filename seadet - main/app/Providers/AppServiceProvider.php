<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Seting;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $settings = Seting::whereId(1)->first();

       View::share('settings',$settings);
    }
}
