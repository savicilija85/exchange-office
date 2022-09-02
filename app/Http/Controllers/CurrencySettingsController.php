<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencySettingRequest;
use App\Models\CurrencySetting;
use App\Repositories\CurrencySettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrencySettingsController extends Controller
{
    private CurrencySettingRepositoryInterface $currencySettingRepository;

    public function __construct(CurrencySettingRepositoryInterface $currencySettingRepository){
        $this->currencySettingRepository = $currencySettingRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param string $code
     * @return Response
     */
    public function show(string $code) : Response
    {
        return response($this->currencySettingRepository->getOneCurrencySetting($code));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencySettingRequest $request
     * @param string $code
     * @return Response
     */
    public function update(CurrencySettingRequest $request, string $code)
    {
        return response($this->currencySettingRepository->updateCurrencySetting($code, $request->all()));
    }
}
