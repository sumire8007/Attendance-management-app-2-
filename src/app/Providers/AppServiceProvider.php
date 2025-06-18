<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

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
        $host = request()->getHost();
        if($host === 'admin.localhost'){
            Config::set('app.url', 'http://admin.localhost' );
            Config::set('session.domain', 'admin.localhost');
        }elseif($host === 'staff.localhost'){
            Config::set('app.url', 'http://staff.localhost');
            Config::set('session.domain', 'staff.localhost');
        }
    }
}
