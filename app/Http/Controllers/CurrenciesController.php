<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Repositories\CurrencyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{

    private CurrencyRepositoryInterface $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $currencyRepository){
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index() : Collection
    {
        return $this->currencyRepository->getNotDefaultCurrencies();
    }
}
