<?php

namespace TelegramBot\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use TelegramBot\Services\Coinbase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $this->app->bind(Coinbase::class, function(){
        return new Coinbase(new Client());
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
