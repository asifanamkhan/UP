<?php

namespace App\Http\Controllers;

use App\BanijjikTax;
use App\BanijjikTaxPayment;
use App\TradeLicenseTaxFee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BanijjikTaxController extends Controller
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
        $business_type=TradeLicenseTaxFee::all();
        return view('pages.dashboard.tax.banijjik_tax.create',compact('business_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tax =  new BanijjikTax();
        $tax->ownerEname = $request->ownerEname;
        $tax->ownerBname = $request->ownerBname;
        $tax->efname = $request->efname;
        $tax->bfname = $request->bfname;
        $tax->emname = $request->emname;
        $tax->bmname = $request->bmname;
        $tax->gram = $request->gram;
        $tax->word_no = $request->word_no;
        $tax->postOffice = $request->postOffice;
        $tax->room_no = $request->room_no;
        $tax->holding_no = $request->holding_no;
        $tax->mashik_vara = $request->mashik_vara;
        $tax->tax_start_date = $request->tax_start_date;
        $tax->last_tax_pay_date = $request->last_tax_pay_date;
        $tax->mob = $request->mob;
        $tax->mashik_vara_tax = $request->mashik_vara_tax;
        $tax->save();

        if (!empty($tax)){

            return 1;
        }
    }

    public function banijjik_kor_aday(Request $request){

        $tax= BanijjikTax::where('word_no',$request->word_no)
                         ->where('holding_no',$request->holding_no)
                         ->get();


        foreach ($tax as $key=>$value){
            $last_tax_pay_date = $value->last_tax_pay_date;
            $tax_amount = $value->mashik_vara_tax;
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

            $amount = $diff*$tax_amount;
        }
        else{
            $amount = 'সর্বশেষ কর পরিষদের তথ্য পাওয়া যায়নি';

        }

        return ([$tax,$amount]);
    }

    public function banijjik_holding_tax_pay($holding_no,$word_no,$tax_amount){
        $payment = BanijjikTax::where('word_no',$word_no)
            ->where('holding_no',$holding_no)
            ->first();

        $last_year1 = substr($payment->last_tax_pay_date, 5,4);
        $last_year2 = $last_year1+1;

        return view('pages.dashboard.tax.banijjik_tax.payment',compact('payment','tax_amount','last_year1','last_year2'));
    }

    public function banijjik_tax_payment(Request $request){

        $tax= BanijjikTax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->first();
        //dd($tax);

        $tax_amount=$tax->mashik_vara;

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

            $amount = $diff*$tax_amount;
        }
        else{
            $amount = 'সর্বশেষ কর পরিষদের তথ্য পাওয়া যায়নি';

        }

        BanijjikTaxPayment::create($request->all());
        return redirect()->route('banijjik_holding_tax_pay',[$request->holding_no,$request->word_no,$amount]);
    }

    public function banijjik_tax_pay_list(Request $request){

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

        $totalData = BanijjikTaxPayment::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = BanijjikTaxPayment::where('word_no',$request->word_no)
                ->where('holding_no',$request->holding_no)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  BanijjikTaxPayment:: where('tax_pay_date','LIKE',"%{$search}%")
                ->orWhere('total_money', 'LIKE',"%{$search}%")
                ->orWhere('total_payable_amount', 'LIKE',"%{$search}%")
                ->orWhere('money_recieve_no', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BanijjikTaxPayment:: where('tax_pay_date','LIKE',"%{$search}%")
                ->orWhere('total_money', 'LIKE',"%{$search}%")
                ->orWhere('total_payable_amount', 'LIKE',"%{$search}%")
                ->orWhere('money_recieve_no', 'LIKE',"%{$search}%")
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
                $nestedData['action'] = ' <div class="btn-group">
                                <a href="'.route('NewNagorikSonodFeeDash',$value->id) .'" class="btn btn-primary btn-sm" title="Generate">
                                    Edit
                                </a>
                            </div>';
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
     * @param  \App\BanijjikTax  $banijjikTax
     * @return \Illuminate\Http\Response
     */
    public function show(BanijjikTax $banijjikTax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BanijjikTax  $banijjikTax
     * @return \Illuminate\Http\Response
     */
    public function edit(BanijjikTax $banijjikTax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BanijjikTax  $banijjikTax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BanijjikTax $banijjikTax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BanijjikTax  $banijjikTax
     * @return \Illuminate\Http\Response
     */
    public function destroy(BanijjikTax $banijjikTax)
    {
        //
    }

    public function banijjik_tax_dhari_talika(){
        return view('pages.dashboard.tax.tax_dhari_talika.banijjik_tax');
    }

    public function banijjikTaxDhariTalika(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'ownerBname',
            2 => 'holding_no',
            3 => 'gram',
            4 => 'room_no',
            5 => 'mashik_vara',
            6 => 'tax_start_date',
            7 => 'last_tax_pay_date',
            8 => 'mashik_vara_tax',

        );

        $totalData = BanijjikTax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = BanijjikTax::where('word_no',$request->word_no)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  BanijjikTax::where('word_no',$request->word_no)
                ->where(function ($query) use ($search ) {
                    $query
                        ->where('ownerBname','LIKE',"%{$search}%")
                        ->orWhere('holding_no', 'LIKE',"%{$search}%")
                        ->orWhere('gram', 'LIKE',"%{$search}%")
                        ->orWhere('mashik_vara', 'LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BanijjikTax::where('word_no',$request->word_no)
                ->count();
        }


        $data = array();

        if(!empty($tax))
        {
            foreach ($tax as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['ownerBname'] = $value->ownerBname;
                $nestedData['holding_no'] = $value->holding_no ;
                $nestedData['gram'] = $value->gram ;
                $nestedData['room_no'] = $value->room_no;
                $nestedData['mashik_vara'] = $value->mashik_vara;
                $nestedData['tax_start_date'] = $value->tax_start_date;
                $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                $nestedData['mashik_vara_tax'] = $value->mashik_vara_tax;
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

    public function banijjik_Tax_print($word_no){
        $taxs = BanijjikTax::where('word_no',$word_no)
            ->get();
        $now = Carbon::now()->toDateString();
        $date=date("d M, Y",strtotime($now));

        return view('pages.dashboard.tax.tax_dhari_talika.banijjik_tax_print',compact('word_no','taxs','date'));

    }

    public function banijjik_tax_onadayeTalika(){
        return view('pages.dashboard.tax.tax_onadaye_talika.banijjik_tax');
    }

    public function BanijjiktaxOandayeTalikaShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'ownerBname',
            2 => 'holding_no',
            3 => 'gram',
            4 => 'room_no',
            5 => 'mashik_vara',
            6 => 'tax_start_date',
            7 => 'last_tax_pay_date',
            8 => 'mashik_vara_tax',

        );

        $totalData = BanijjikTax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = BanijjikTax::where('word_no',$request->word_no)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

        }
        else {
            $search = $request->input('search.value');

            $tax =  BanijjikTax::where('word_no',$request->word_no)
                ->where(function ($query) use ($search ) {
                    $query
                        ->where('ownerBname','LIKE',"%{$search}%")
                        ->orWhere('holding_no', 'LIKE',"%{$search}%")
                        ->orWhere('gram', 'LIKE',"%{$search}%")
                        ->orWhere('room_no', 'LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BanijjikTax::where('word_no',$request->word_no)
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
                            $nestedData['id'] = $key+1;
                            $nestedData['ownerBname'] = $value->ownerBname;
                            $nestedData['holding_no'] = $value->holding_no ;
                            $nestedData['gram'] = $value->gram ;
                            $nestedData['room_no'] = $value->room_no;
                            $nestedData['mashik_vara'] = $value->mashik_vara;
                            $nestedData['tax_start_date'] = $value->tax_start_date;
                            $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                            $nestedData['mashik_vara_tax'] = $value->mashik_vara_tax;
                            $data[] = $nestedData;
                        }
                    }

                }
                if ($current_month < 6) {
                    foreach ($tax as $key => $value) {
                        $last_tax_pay_date = substr($value->last_tax_pay_date, 5, 4);
                        $currentYear = Carbon::now()->format('Y');
                        if ($last_tax_pay_date < $currentYear) {
                            $nestedData['id'] = $key+1;
                            $nestedData['ownerBname'] = $value->ownerBname;
                            $nestedData['holding_no'] = $value->holding_no ;
                            $nestedData['gram'] = $value->gram ;
                            $nestedData['room_no'] = $value->room_no;
                            $nestedData['mashik_vara'] = $value->mashik_vara;
                            $nestedData['tax_start_date'] = $value->tax_start_date;
                            $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                            $nestedData['mashik_vara_tax'] = $value->mashik_vara_tax;
                            $data[] = $nestedData;
                        }
                    }
                }
            }
            else{
                foreach ($tax as $key => $value)
                {
                    if(($value->last_tax_pay_date) != ($request->last_tax_pay_date)){
                        $nestedData['id'] = $key+1;
                        $nestedData['ownerBname'] = $value->ownerBname;
                        $nestedData['holding_no'] = $value->holding_no ;
                        $nestedData['gram'] = $value->gram ;
                        $nestedData['room_no'] = $value->room_no;
                        $nestedData['mashik_vara'] = $value->mashik_vara;
                        $nestedData['tax_start_date'] = $value->tax_start_date;
                        $nestedData['last_tax_pay_date'] = $value->last_tax_pay_date;
                        $nestedData['mashik_vara_tax'] = $value->mashik_vara_tax;
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

    public function banijjik_Tax_onadaye_print($word_no,$last_tax_pay_date){
        $taxs = BanijjikTax::where('word_no',$word_no)
            ->where('last_tax_pay_date','!=',$last_tax_pay_date)
            ->get();
        $now = Carbon::now()->toDateString();
        $date=date("d M, Y",strtotime($now));

        return view('pages.dashboard.tax.tax_onadaye_talika.banijjik_tax_print',compact('word_no','taxs','date'));

    }
}
