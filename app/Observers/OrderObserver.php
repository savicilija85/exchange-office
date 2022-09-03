<?php

namespace App\Observers;

use App\Mail\OrderSuccessful;
use App\Models\Order;
use App\Models\User;
use App\Repositories\CurrencySettingRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    private CurrencySettingRepositoryInterface $currencySettingRepository;

    public function __construct(CurrencySettingRepositoryInterface $currencySettingRepository){
        $this->currencySettingRepository = $currencySettingRepository;
    }

    /**
     * Handle the Order "creating" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function creating(Order $order)
    {
        switch ($order->code){
            case 'EUR':
                $currencySetting = $this->currencySettingRepository->getOneCurrencySetting($order->code);

                $order->discount_percentage = $currencySetting->discount;
                $order->discount_amount = ($order->discount_percentage / 100) * $order->amount_paid;
                $order->discount_amount = round($order->discount_amount, 2);
                $order->amount_paid = $order->amount_paid - $order->discount_amount;

                break;
        }
    }

    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        switch ($order->code){
            case 'GBP':
                $user = User::find(1);
                Mail::to($user->email)->send(new OrderSuccessful($order));
                break;
        }
    }
}
