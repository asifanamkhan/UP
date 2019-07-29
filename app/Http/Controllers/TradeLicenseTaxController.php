<?php

namespace App\Http\Controllers;

use App\TradeLicenseTax;
use Illuminate\Http\Request;

class TradeLicenseTaxController extends Controller
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
        return view('pages.dashboard.tax.trade_license_tax.create');
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
     * @param  \App\TradeLicenseTax  $tradeLicenseTax
     * @return \Illuminate\Http\Response
     */
    public function show(TradeLicenseTax $tradeLicenseTax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TradeLicenseTax  $tradeLicenseTax
     * @return \Illuminate\Http\Response
     */
    public function edit(TradeLicenseTax $tradeLicenseTax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TradeLicenseTax  $tradeLicenseTax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TradeLicenseTax $tradeLicenseTax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TradeLicenseTax  $tradeLicenseTax
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradeLicenseTax $tradeLicenseTax)
    {
        //
    }
}
