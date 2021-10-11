<?php


namespace Edzhub\Zslapi;


use Illuminate\Support\ServiceProvider;

class ZslapiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/zslapi.php',
            'zslapi'
        );
        $this->publishes([
            __DIR__ . '/config/zslapi.php' => \config_path('zslapi.php')
        ]);
    }

    public function register()
    {

    }
}