<?php

namespace App\Providers;
use App\Helpers\MyCaptchat;
use Illuminate\Support\ServiceProvider;

class MyCaptchatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MyCaptchat', function(){
            return new MyCaptchat();
        });
    }
}
