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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrencySetting  $currencySetting
     * @return Response
     */
    public function edit(CurrencySetting $currencySetting)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrencySetting  $currencySetting
     * @return Response
     */
    public function destroy(CurrencySetting $currencySetting)
    {
        //
    }
}
