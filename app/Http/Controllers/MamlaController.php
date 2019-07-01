<?php

namespace App\Http\Controllers;

use App\Mamla;
use Illuminate\Http\Request;

class MamlaController extends Controller
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
        return view('pages.dashboard.mamla.create');
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
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function show(Mamla $mamla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function edit(Mamla $mamla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mamla $mamla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mamla $mamla)
    {
        //
    }
}
