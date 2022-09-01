<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrenciesController;
use App\Http\Controllers\ExchangeRatesController;
use App\Http\Controllers\CurrencySettingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('currencies', CurrenciesController::class)->only(['index']);
Route::resource('exchange_rates', ExchangeRatesController::class)->only(['show']);
Route::resource('currency_settings', CurrencySettingsController::class)->only(['show']);
