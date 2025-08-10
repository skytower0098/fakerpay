<?php

namespace Skytower0098\FakerPay\Providers;

use Illuminate\Support\ServiceProvider;

class FakerPayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'fakerpay');
    }

    public function register()
    {
        //
    }
}
