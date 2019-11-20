<?php

namespace App\Http\Controllers;

use App\BusinessTax;
use App\BusinessTaxPay;
use App\TradeLicenseTaxFee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BusinessTaxController extends Controller
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
        $business_type   = TradeLicenseTaxFee::all();
        return view('pages.dashboard.tax.business_tax.create',compact('business_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ownerBname'      => 'required|string',
            'bfname'      => 'required|string',
            'bmname'      => 'required|string',

        ]);


        $tax =  new BusinessTax();
        $tax->ownerEname = $request->ownerEname;
        $tax->ownerBname = $request->ownerBname;
        $tax->efname = $request->efname;
        $tax->bfname = $request->bfname;
        $tax->emname = $request->emname;
        $tax->bmname = $request->bmname;
        $tax->postOffice = $request->postOffice;
        $tax->gram = $request->gram;
        $tax->word_no = $request->word_no;
        $tax->holding_no = $request->holding_no;
        $tax->roomNo = $request->roomNo;
        $tax->business_type = $request->business_type;
        $tax->tax_start_date = $request->tax_start_date;
        $tax->last_tax_pay_date = $request->last_tax_pay_date;
        $tax->mob = $request->mob;

        $tax->save();

        if (!empty($tax)){
           return redirect()->back()->with('success','form submitted successfully');
        }

    }

    public function business_kor_aday(Request $request){
        $tax= BusinessTax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('roomNo',$request->roomNo)
            ->first();

        if(!empty($tax)){
            $last_tax_pay_date = $tax->last_tax_pay_date;

            $tax_amount = TradeLicenseTaxFee::where('id',$tax->business_type)->first();
        }
        else{
            $tax_amount=0;
        }
        if(empty($last_tax_pay_date)){
            $last_tax_pay_date="";
        }

        $last_year = substr($last_tax_pay_date, 5,4);
        if(!empty($last_year)){
            $curent_month= Carbon::now()->format('m');
            if($curent_month>6){
                $curent_year = Carbon::now()->addYears(1)->format('Y');
            }
            else{
                $curent_year= Carbon::now()->format('Y');
            }
            $diff = (int)$curent_year-(int)$last_year;

            $amount = $diff*$tax_amount->amount;
        }
        else{
            $amount = 'সর্বশেষ কর পরিষদের তথ্য পাওয়া যায়নি';

        }

        return ([$tax,$amount,$tax_amount]);
    }

    public function business_tax_pay($holding_no,$word_no,$roomNo,$tax_amount){
        $payment = BusinessTax::where('word_no',$word_no)
            ->where('holding_no',$holding_no)
            ->where('roomNo',$roomNo)
            ->first();

        $business_Type = TradeLicenseTaxFee::where('id',$payment->business_type)->first();
        //dd($business_Type);
        $last_year1 = substr($payment->last_tax_pay_date, 5,4);
        $last_year2 = $last_year1+1;

        return view('pages.dashboard.tax.business_tax.payment',compact('payment','tax_amount','last_year1','last_year2','business_Type'));
    }

    public function business_tax_payment(Request $request){

        $tax= BusinessTax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('roomNo',$request->roomNo)
            ->first();
        //dd($tax);

        $tax_amount = TradeLicenseTaxFee::where('id',$tax->business_type)->first();

        $last_tax_pay_date_prev = substr($request->last_tax_pay_date, 5,4);
        $last_tax_pay_date1 = $last_tax_pay_date_prev + $request->ortho_year_payable;
        $last_tax_pay_date2 = ($last_tax_pay_date_prev + $request->ortho_year_payable)-1;
        $last_tax_pay_date = $last_tax_pay_date2 .'-'.$last_tax_pay_date1;
        $tax->update(['last_tax_pay_date'=>$last_tax_pay_date]);


        $last_year = substr($last_tax_pay_date, 5,4);
        if(!empty($last_year)){
            $curent_month= Carbon::now()->format('m');
            if($curent_month>6){
                $curent_year = Carbon::now()->addYears(1)->format('Y');
            }
            else{
                $curent_year= Carbon::now()->format('Y');
            }
            $diff = (int)$curent_year-(int)$last_year;

            $amount = $diff*$tax_amount->amount;
        }
        else{
            $amount = 'সর্বশেষ কর পরিষদের তথ্য পাওয়া যায়নি';
        }

        BusinessTaxPay::create($request->all());
        return redirect()->route('business_tax_pay',[$request->holding_no,$request->word_no,$request->roomNo,$amount]);
    }

    public function business_tax_pay_list(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'tax_pay_date',
            2 =>'money_recieve_no',
            3 => 'last_tax_pay_date',
            4 => 'total_money',
            5 => 'moukuf',
            6 => 'total_payable_amount',
            7 => 'action',

        );

        $totalData = BusinessTaxPay::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = BusinessTaxPay::where('holding_no',$request->holding_no)
                ->where('word_no',$request->word_no)
                ->where('roomNo',$request->roomNo)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  BusinessTaxPay:: where('tax_pay_date','LIKE',"%{$search}%")
                ->orWhere('holding_no', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BusinessTaxPay:: where('tax_pay_date','LIKE',"%{$search}%")
                ->orWhere('holding_no', 'LIKE',"%{$search}%")
                ->orWhere('word_no','LIKE',"%{$search}%")
                ->orWhere('roomNo','LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($tax))
        {
            foreach ($tax as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['tax_pay_date'] = date("d M Y",strtotime($value->created_at));
                $nestedData['money_recieve_no'] = $value->money_recieve_no;
                $nestedData['total_money'] = $value->total_money ;
                $nestedData['moukuf'] = $value->moukuf;
                $nestedData['total_payable_amount'] = $value->total_payable_amount;
//                $nestedData['action'] = ' <div class="btn-group">
//                                <a href="'.route('NewNagorikSonodFeeDash',$value->id) .'" class="btn btn-primary btn-sm" title="Generate">
//                                    Edit
//                                </a>
//                            </div>';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessTax  $businessTax
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessTax $businessTax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessTax  $businessTax
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessTax $businessTax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessTax  $businessTax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessTax $businessTax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessTax  $businessTax
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessTax $businessTax)
    {
        //
    }

    public function business_tax_dhari_talika(){
        return view('pages.dashboard.tax.tax_dhari_talika.business_tax');
    }

    public function BusinesstaxDhariTalika(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'holding_no',
            3 => 'bosot_vitar_dhoron',
            4 => 'room_no',
            5 => 'occupation',
            6 => 'tax_class',
            7 => 'tax_start_date',

        );

        $totalData = BusinessTax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = BusinessTax::where('word_no',$request->word_no)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  BusinessTax::where('word_no',$request->word_no)
                ->where(function ($query) use ($search ) {
                    $query
                        ->where('ownerBname','LIKE',"%{$search}%")
                        ->orWhere('holding_no', 'LIKE',"%{$search}%")
                        ->orWhere('roomNo', 'LIKE',"%{$search}%")
                        ->orWhere('gram', 'LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BusinessTax::where('word_no',$request->word_no)
                ->count();
        }


        $data = array();

        if(!empty($tax))
        {     foreach ($tax as $key => $value)
            {
                $business_type = TradeLicenseTaxFee::where('id',$value->business_type)->first();

                $nestedData['id'] = $key+1;
                $nestedData['ownerBname'] = $value->ownerBname;
                $nestedData['holding_no'] = $value->holding_no ;
                $nestedData['gram'] = $value->gram;
                $nestedData['roomNo'] = $value->roomNo;
                $nestedData['business_type'] = $business_type->business_type;
                $nestedData['tax_start_date'] = $value->tax_start_date;
                $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    public function business_Tax_print($word_no){

        $taxs = BusinessTax::where('word_no',$word_no)
            ->get();
        $now = Carbon::now()->toDateString();
        $date=date("d M, Y",strtotime($now));

        return view('pages.dashboard.tax.tax_dhari_talika.business_Tax_print',compact('word_no','taxs','date'));

    }

    public function business_tax_onadayeTalika(){
        return view('pages.dashboard.tax.tax_onadaye_talika.business_tax');
    }

    public function BusinesstaxOandayeTalikaShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'holding_no',
            3 => 'bosot_vitar_dhoron',
            4 => 'room_no',
            5 => 'occupation',
            6 => 'tax_class',
            7 => 'last_tax_pay_date',

        );

        $totalData = BusinessTax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {

            $tax = BusinessTax::where('word_no',$request->word_no)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

        }
        else {
            $search = $request->input('search.value');

            $tax =  BusinessTax::where('word_no',$request->word_no)

                ->where(function ($query) use ($search ) {
                    $query
                        ->where('bname','LIKE',"%{$search}%")
                        ->orWhere('holding_no', 'LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BusinessTax::where('word_no',$request->word_no)
                ->count();
        }


        $data = array();

        if(!empty($tax))
        {
            $current_month= Carbon::now()->format('m');
            if($request->last_tax_pay_date==1) {
                if ($current_month > 6) {
                    foreach ($tax as $key => $value) {
                        $last_tax_pay_date = substr($value->last_tax_pay_date, 5, 4);
                        $currentYear = Carbon::now()->addYear(1)->format('Y');
                        if ($last_tax_pay_date < $currentYear) {

                            $business_type = TradeLicenseTaxFee::where('id',$value->business_type)->first();
                            $nestedData['id'] = $key+1;
                            $nestedData['ownerBname'] = $value->ownerBname;
                            $nestedData['holding_no'] = $value->holding_no ;
                            $nestedData['gram'] = $value->gram;
                            $nestedData['roomNo'] = $value->roomNo;
                            $nestedData['business_type'] = $business_type->business_type;
                            $nestedData['tax_start_date'] = $value->tax_start_date;
                            $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                            $data[] = $nestedData;
                        }
                    }

                }
                if ($current_month < 6) {
                    foreach ($tax as $key => $value) {
                        $last_tax_pay_date = substr($value->last_tax_pay_date, 5, 4);
                        $currentYear = Carbon::now()->format('Y');
                        if ($last_tax_pay_date < $currentYear) {

                            $business_type = TradeLicenseTaxFee::where('id',$value->business_type)->first();

                            $nestedData['id'] = $key+1;
                            $nestedData['ownerBname'] = $value->ownerBname;
                            $nestedData['holding_no'] = $value->holding_no ;
                            $nestedData['gram'] = $value->gram;
                            $nestedData['roomNo'] = $value->roomNo;
                            $nestedData['business_type'] = $business_type->business_type;
                            $nestedData['tax_start_date'] = $value->tax_start_date;
                            $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                            $data[] = $nestedData;
                        }
                    }
                }
            }
            else{
                foreach ($tax as $key => $value)
                {
                    if(($value->last_tax_pay_date) != ($request->last_tax_pay_date)){
                        $business_type = TradeLicenseTaxFee::where('id',$value->business_type)->first();

                        $nestedData['id'] = $key+1;
                        $nestedData['ownerBname'] = $value->ownerBname;
                        $nestedData['holding_no'] = $value->holding_no ;
                        $nestedData['gram'] = $value->gram;
                        $nestedData['roomNo'] = $value->roomNo;
                        $nestedData['business_type'] = $business_type->business_type;
                        $nestedData['tax_start_date'] = $value->tax_start_date;
                        $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                        $data[] = $nestedData;
                    }
                }
            }

        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    public function business_Tax_onadaye_print($word_no,$last_tax_pay_date){
        $taxs = BusinessTax::where('word_no',$word_no)
            ->where('last_tax_pay_date','!=',$last_tax_pay_date)
            ->get();
        $now = Carbon::now()->toDateString();
        $date=date("d M, Y",strtotime($now));

        return view('pages.dashboard.tax.tax_onadaye_talika.business_tax_print',compact('word_no','taxs','date'));

    }
}
