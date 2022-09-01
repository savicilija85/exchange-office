<?php

namespace App\Http\Controllers;

use App\Models\CurrencySetting;
use Illuminate\Http\Request;

class CurrencySettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrencySetting  $currencySetting
     * @return CurrencySetting
     */
    public function show(CurrencySetting $currencySetting) : CurrencySetting
    {
        return $currencySetting;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrencySetting  $currencySetting
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrencySetting $currencySetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CurrencySetting  $currencySetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurrencySetting $currencySetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrencySetting  $currencySetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrencySetting $currencySetting)
    {
        //
    }
}
