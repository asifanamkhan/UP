<?php

namespace App\Http\Controllers;

use App\TradeLicenseTax;
use App\TradeLicenseTaxFee;
use App\TradeLicenseTaxPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\TradeLicenseAbedon;
use Carbon\Carbon;

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

    public function trade_license_tax_fee(){
        return view('pages.dashboard.setup_menu.trade_license_tax_fee.create');
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

    public function tradeLicenseFeestore(Request $request){

        $request->validate([
            'business_type' => 'required|string|unique:trade_license_tax_fees|max:255',
            'amount' => 'required|numeric',

        ]);

        $trade =  new TradeLicenseTaxFee();
        $trade->business_type = $request->business_type;
        $trade->amount = $request->amount;
        $trade->muldhon = $request->muldhon;
        $trade->status = 1;
        $trade->save();

        return redirect()->back()->with('success','submitted successfully');
    }

    public function tradeLienseType_name(Request $request){
        $trade = TradeLicenseTaxFee::where('business_type',$request->business_type)->first();

        if(empty($trade)){
            return 'one';
        }
        else
            return 'two';
    }

    public function tradeLicenseFeeShow(Request $request){

        $columns = array(
            0 =>'id',
            1 =>'business_type',
            2 =>'amount',
            3 => 'updated_at',
            4 => 'status',
            5 => 'action',

        );

        $totalData = TradeLicenseTaxFee::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $TradeLicenseTaxFee = TradeLicenseTaxFee::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $TradeLicenseTaxFee =  TradeLicenseTaxFee::where('business_type','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('amount', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = TradeLicenseTaxFee::where('business_type','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('amount', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($TradeLicenseTaxFee))
        {
            foreach ($TradeLicenseTaxFee as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['business_type'] = $value->business_type;
                $nestedData['amount'] = $value->amount;
                $nestedData['updated_at'] = date("d M Y",strtotime($value->updated_at));
                if($value->status==1){
                    $nestedData['status'] = '<p style="color: green">Enable</p>' ;
                }else{
                    $nestedData['status'] =  '<p style="color: red">Disable</p>';
                }
                $nestedData['action'] = ' <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-sm" id="edit" title="edit">
                                   <i class="fa fa-edit"></i> Edit
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

    public function trade_license_kor_aday(Request $request){

        $tax= TradeLicenseAbedon::with('business')
            ->where('be_wordno',$request->word_no)
            ->where('taxid',$request->taxid)
            ->where('dokanNo',$request->dokanNo)
            ->where('btalikaNo',$request->btalikaNo)
            ->get();


        foreach ($tax as $key=>$value){
            $last_tax_pay_date = $value->last_tax_pay_date;
            $tax_amount = $value->tax_amount;
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

    //get page
    public function tradeLicense_tax_pay($taxid,$word_no,$dokan,$tax_amount,$btalikaNo){

        $payment = TradeLicenseAbedon::where('be_wordno',$word_no)
            ->where('taxid',$taxid)
            ->where('btalikaNo',$btalikaNo)
            ->where('dokanNo',$dokan)
            ->first();

        $last_year1 = substr($payment->last_tax_pay_date, 5,4);
        $last_year2 = $last_year1+1;

        return view('pages.dashboard.tax.trade_license_tax.payment',compact('payment','tax_amount','last_year1','last_year2'));
    }

    //post payment
    public function trade_license_tax_payment(Request $request){

        $tax= TradeLicenseAbedon::where('taxid',$request->taxid)
            ->where('be_wordno',$request->word_no)
            ->where('dokanNo',$request->dokanNo)
            ->where('btalikaNo',$request->btalikaNo)
            ->first();

      $tax_amount=$tax->tax_amount;

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

        TradeLicenseTaxPayment::create($request->all());
        return redirect()->route('tradeLicense_tax_pay',[$request->taxid,$request->word_no,$request->dokanNo,$amount,$request->btalikaNo]);

    }
    public function tradeLcense_tax_pay_list(Request $request){

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

        $totalData = TradeLicenseTaxPayment::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = TradeLicenseTaxPayment::where('taxid',$request->taxid)
                ->where('word_no',$request->word_no)
                ->where('dokanNo',$request->dokanNo)
                ->where('btalikaNo',$request->btalikaNo)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  TradeLicenseTaxPayment:: where('tax_pay_date','LIKE',"%{$search}%")
                ->orWhere('total_money', 'LIKE',"%{$search}%")
                ->orWhere('total_payable_amount', 'LIKE',"%{$search}%")
                ->orWhere('money_recieve_no', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = TradeLicenseTaxPayment:: where('tax_pay_date','LIKE',"%{$search}%")
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
}

