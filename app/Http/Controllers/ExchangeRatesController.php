<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use App\Repositories\ExchangeRateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExchangeRatesController extends Controller
{
    private ExchangeRateRepositoryInterface $exchangeRateRepository;

    public function __construct(ExchangeRateRepositoryInterface $exchangeRateRepository)
    {
        $this->exchangeRateRepository = $exchangeRateRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param string $code
     * @return Response
     */
    public function show(string $code) : Response
    {
        sleep(5);
        return response($this->exchangeRateRepository->getOneExchangeRate($code));
    }
}
