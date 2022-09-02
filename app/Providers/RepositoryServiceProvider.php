<?php

namespace App\Providers;

use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\Eloquent\CurrencyRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
