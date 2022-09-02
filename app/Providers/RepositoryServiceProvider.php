<?php

namespace App\Providers;

use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\CurrencySettingRepositoryInterface;
use App\Repositories\Eloquent\CurrencyRepository;
use App\Repositories\Eloquent\CurrencySettingRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
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
        $this->app->bind(CurrencySettingRepositoryInterface::class, CurrencySettingRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
