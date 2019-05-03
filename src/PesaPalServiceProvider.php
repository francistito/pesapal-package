<?php

namespace  Blessedkono\Pesapal;



use Illuminate\Support\ServiceProvider;

class PesaPalServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views','pesapal');

        $this->mergeConfigFrom(
        __DIR__.'/config/pesapal.php', 'pesapal'
    );

          $this->publishes([
        __DIR__.'/config/pesapal.php' => config_path('pesapal.php'),
    ]);
    }

    public function register()
    {

    }
}