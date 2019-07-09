<?php

namespace App\Http\Controllers;

use App\BosotVitarDhoron;
use App\Tax;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TaxController extends Controller
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
        //$member_no = Tax::groupBy('holding_no')->get()->count();
        $result = null;
        $bosot_vitar_dhoron = BosotVitarDhoron::all();
        return view('pages.dashboard.tax.holding_tax',compact('result','bosot_vitar_dhoron'));
    }

    public function trade_license_tax(){
        return view('pages.dashboard.tax.trade_license_tax');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i=0; $i < count($request->name) ; $i++) {

            $tax =  new Tax();

            $tax->member_no = $request->member_no[$i];
            $tax->holding_no = $request->holding_no;
            $tax->word_no = $request->word_no;
            $tax->name = $request->name[$i];
            $tax->bname = $request->bname[$i];
            $tax->efname = $request->efname[$i];
            $tax->bfname = $request->bfname[$i];
            $tax->emname = $request->emname[$i];
            $tax->bmname = $request->bmname[$i];
            $tax->nid = $request->nid[$i];
            $tax->birth_cer = $request->birth_cer[$i];
            $tax->occa = $request->occa[$i];
            $tax->mob = $request->mob[$i];
            $tax->ref_name = $request->ref_name[$i];
            $tax->e_gram = $request->e_gram;
            $tax->b_gram = $request->b_gram;
            $tax->e_post = $request->e_post;
            $tax->b_post = $request->b_post;
            $tax->boshot_dhoron = $request->boshot_dhoron;
            $tax->tax_class = $request->tax_class;
            $tax->tax_start_date = $request->tax_start_date;
            $tax->last_tax_pay_date = $request->last_tax_pay_date;


            $tax->save();

            //$product->product_name = $request->product_name[$i];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //
    }

    //bosot_kor_aday_table_ajax

    public function bosot_kor_aday(Request $request){

        $holding = Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('member_no',1)
            ->get();


        return $holding;
    }

    //bosot_member_no
    public function bosot_member_no(Request $request){
        $member_no = Tax::where('word_no','=',$request->word_no)
            ->where('holding_no','=',$request->holding_no)
            ->count();
        $member_info =Tax::where('word_no','=',$request->word_no)
            ->where('holding_no','=',$request->holding_no)
            ->first();


        if(empty($member_no)){

            return 'one';
        }
        else
            return ([$member_no,$member_info]);
    }

    public function holding_tax_pay($holding,$word,$member){
        //dd($member);
        $payment = Tax::where('word_no',$word)
            ->where('holding_no',$holding)
            ->where('member_no',$member)->first();
        return view('pages.dashboard.tax.holding_tax_payment',compact('payment'));
    }

    public function tax_assesment_form(){
        return view('pages.dashboard.tax.tax_assesment_form');
    }
}
