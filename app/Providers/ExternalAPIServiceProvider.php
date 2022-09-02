<?php

namespace App\Providers;

use App\Services\API\CurrencyLayerService;
use App\Services\CurrencyLayerServiceInterface;
use Illuminate\Support\ServiceProvider;

class ExternalAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CurrencyLayerServiceInterface::class, CurrencyLayerService::class);
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
