<?php

namespace App\Http\Controllers;

use App\FrontEnd;
use App\NagorikAbedon;
use App\UPmember;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members=UPmember::all();
        //dd($members);
       return view('pages.front_end.home',compact('members'));
    }

    public function sdgDesignFrontEnd(){
        return view('pages.front_end.sdc.sdgDesignFrontEnd');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function show(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontEnd $frontEnd)
    {
        //
    }
}
