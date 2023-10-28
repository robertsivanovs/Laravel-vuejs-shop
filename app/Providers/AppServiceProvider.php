<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\OrderServiceInterface;
use App\Services\OrderService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
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
