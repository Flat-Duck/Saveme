<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Observers\ClinkObserver;
use App\Clink;
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
       Clink::observe(ClinkObserver::class);
    }
}
