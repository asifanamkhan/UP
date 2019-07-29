<?php

namespace App\Http\Controllers;

use App\TradeLicenseAbedon;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use DB;

class TradeLicenseAbedonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trade_license_abedon=TradeLicenseAbedon::all();
        return view('pages.dashboard.trade_license_abedon.trade_license_abedon_dash',compact('trade_license_abedon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.front_end.abedon_potro.trade_license_abedon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('image')){
            $images = $request->file('image');
            $attached  = str_random( 2 ) . time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path().'/images/';
            $images->move($destinationPath,$attached);

        }
        else{
            $attached = "";
        }

        $year = Carbon::now()->year;
        $sonod_no = $year . time().mt_rand(100, 999);

        TradeLicenseAbedon::create([

            'sonod_no'=>$sonod_no,
            'mob'=>$request->mob,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'pay_amount'=>$request->pay_amount,
            'token'=>$request->token,
            'status'=>0,

            'image'=>$attached,
            'delivery_type'=>$request->delivery_type,
            'ownertype'=>$request->ownertype,
            'ecomname'=>$request->ecomname,
            'bcomname'=>$request->bcomname,
            'dokanNo'=>$request->dokanNo,
            'btalikaNo'=>$request->btalikaNo,
            'bazarName'=>$request->bazarName,

            'vatid'=>$request->vatid,
            'taxid'=>$request->taxid,
            'tax_start_date'=>$request->tax_start_date,
            'last_tax_pay_date'=>$request->last_tax_pay_date,
            'business_type'=>$request->business_type,

            'be_gram'=>$request->be_gram,
            'be_rbs'=>$request->be_rbs,
            'be_wordno'=>$request->be_wordno,
            'be_dis'=>$request->be_dis,
            'be_thana'=>$request->be_thana,
            'be_postof'=>$request->be_postof,

            'bb_gram'=>$request->bb_gram,
            'bb_rbs'=>$request->bb_rbs,
            'bb_wordno'=>$request->bb_wordno,
            'bb_dis'=>$request->bb_dis,
            'bb_thana'=>$request->bb_thana,
            'bb_postof'=>$request->bb_postof,

            'efname'  => implode("|",$request->efname),
            'ewname'  => implode("|",$request->ewname),
            'bwname'  => implode("|",$request->bwname),
            'gender'  => implode("|",$request->gender),
            'mstatus'  => implode("|",$request->mstatus),
            'bfname'  => implode("|",$request->bfname),
            'esname'  => implode("|",$request->esname),
            'bsname'  => implode("|",$request->bsname),
            'emname'  => implode("|",$request->emname),
            'bmname'  => implode("|",$request->bmname),

        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TradeLicenseAbedon  $tradeLicenseAbedon
     * @return \Illuminate\Http\Response
     */
    public function show(TradeLicenseAbedon $tradeLicenseAbedon)
    {
        return view('pages.dashboard.trade_license_abedon.trade_license_abedon_show',compact('tradeLicenseAbedon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TradeLicenseAbedon  $tradeLicenseAbedon
     * @return \Illuminate\Http\Response
     */
    public function edit(TradeLicenseAbedon $tradeLicenseAbedon)
    {
        return view('pages.dashboard.trade_license_abedon.trade_license_edit',compact('tradeLicenseAbedon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TradeLicenseAbedon  $tradeLicenseAbedon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TradeLicenseAbedon $tradeLicenseAbedon)
    {
        $tradeLicenseAbedon->update($request->all());
        return redirect()->route('trade_license_abedon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TradeLicenseAbedon  $tradeLicenseAbedon
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradeLicenseAbedon $tradeLicenseAbedon)
    {
        $tradeLicenseAbedon->delete();
        return redirect()->route('trade_license_abedon.index');
    }

    public function trade_lincense_jachay(){
        return view('pages.front_end.abedon_jachay.trade_license_jachay');
    }

    public function tradeLicenseIndex(Request $request){


        $columns = array(
            0 =>'id',
            1 =>'bwname',
            2 => 'token',
            3 => 'id',
            4 => 'delivery_type',
            5 => 'mob',
            6 => 'ecomname',
            7 => 'created_at',
            8 => 'certificates',
            9 => 'money_receipt',

        );

        $totalData = TradeLicenseAbedon::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            if($request->is_days == 2){



                $date1 = Carbon::today()->toDateString();
                $date2 = Carbon::today()->subDays(1)->toDateString();
                $TradeLicense = TradeLicenseAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $TradeLicense = TradeLicenseAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $TradeLicense = TradeLicenseAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $TradeLicense = TradeLicenseAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $TradeLicense = TradeLicenseAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $TradeLicense =  TradeLicenseAbedon::where('bwname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->orWhere('ecomname', 'LIKE',"%{$search}%")
                ->orWhere('sonod_no', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = TradeLicenseAbedon::where('bwname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('ecomname', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->orWhere('sonod_no', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($TradeLicense))
        {
            foreach ($TradeLicense as $key => $value)
            {
                if($value->status == 1){
                    $nestedData['id'] = $key + 1;
                    $nestedData['bwname'] = $value->bwname;
                    $nestedData['token'] = $value->token;
                    $nestedData['sonod_no'] = $value->sonod_no;
                    if($value->delivery_type == 1){
                        $nestedData['delivery_type'] = 'জরুরী';
                    }
                    elseif ($value->delivery_type == 2){
                        $nestedData['delivery_type'] = 'অতি জরুরী';
                    }
                    else{
                        $nestedData['delivery_type'] = 'সাধারন';
                    }
                    $nestedData['mob'] = $value->mob;
                    $nestedData['ecomname'] = $value->ecomname;
                    $nestedData['created_at'] = $value->created_at->toDateString();
                    $nestedData['certificates'] = '<div class="">
                                                    <a href="#"><button class="btn-sm btn-info">বাংলা</button></a>
                                                    <a href="#"><button class="btn-sm btn-primary">ইংরেজী</button></a>
                                                </div>';
                    $nestedData['money_receipt'] = '<div class="">
                                                    <a href="#"><button class="btn-sm btn-success">Print</button></a>
                                                </div>';

                    $data[] = $nestedData;
                }

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }
    public function NewTradeLicenseIndex(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'bwname',
            2 => 'token',
            3 => 'delivery_type',
            4 => 'mob',
            5 => 'ecomname',
            6 => 'created_at',
            7 => 'certificates',

        );

        $totalData = TradeLicenseAbedon::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $TradeLicenseAbedon = TradeLicenseAbedon::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $TradeLicenseAbedon = TradeLicenseAbedon::where('bwname', 'LIKE', "%{$search}%")
                ->orWhere('token', 'LIKE', "%{$search}%")
                ->orWhere('delivery_type', 'LIKE', "%{$search}%")
                ->orWhere('ecomname', 'LIKE', "%{$search}%")
                ->orWhere('mob', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = TradeLicenseAbedon::where('bwname', 'LIKE', "%{$search}%")
                ->orWhere('token', 'LIKE', "%{$search}%")
                ->orWhere('delivery_type', 'LIKE', "%{$search}%")
                ->orWhere('ecomname', 'LIKE', "%{$search}%")
                ->orWhere('mob', 'LIKE', "%{$search}%")
                ->count();
        }


        $data = array();

        if (!empty($TradeLicenseAbedon)) {
            foreach ($TradeLicenseAbedon as $key => $value) {
                if ($value->status == 0) {
                    $nestedData['id'] = $key+1;
                    $nestedData['bwname'] = $value->bwname;
                    $nestedData['token'] = $value->token;

                    if ($value->delivery_type == 1) {
                        $nestedData['delivery_type'] = 'জরুরী';
                    } elseif ($value->delivery_type == 2) {
                        $nestedData['delivery_type'] = 'অতি জরুরী';
                    } else {
                        $nestedData['delivery_type'] = 'সাধারন';
                    }
                    $nestedData['mob'] = $value->mob;
                    $nestedData['ecomname'] = $value->ecomname;
                    $nestedData['created_at'] = $value->created_at->toDateString();
                    $nestedData['certificates'] = ' <div class="btn-group">
                                    <a href="' . route('NewTradeLicenseFeeDash', $value->id) . '" class="btn btn-primary btn-sm" title="Generate">
                                        Genetrate
                                    </a>
                                </div>';
                    $data[] = $nestedData;
                }

            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);

    }
    public function New_TradeLicense_abedon(){
        return view('pages.dashboard.trade_license_abedon.new_trade_license_abedon_dash');
    }
    public function NewTradeLicenseFeeDash($id){

        $fee = TradeLicenseAbedon::find($id);
        $year = $fee->created_at->format('Y');
        $addYear= $fee->created_at->add(1,'year')->format('Y');

        //dd($year);
        $month = $fee->created_at->format('m');
        //dd($month);
        if($month<6){
           $dadeline = ''.$year.'-06-30';
           //dd($dadeline);

        }
        else
        {
            $dadeline = ''.$addYear.'-06-30';
        }
        return view('pages.dashboard.trade_license_abedon.trade_License_Fee_Dash',compact('fee','dadeline'));
    }

    public function tradeFee(Request $request,$id){
        $trade = TradeLicenseAbedon::find($id);

        $trade->update([
            'status'=>1,
            'payment_type'=>$request->payment_type,
            'endDate'=>$request->endDate,
            'tradeFee'=>$request->tradeFee,
            'signBoardTaxField'=>$request->signBoardTaxField,
            'dueFee'=>$request->dueFee,
            'suparishFee'=>$request->suparishFee,
            'vat'=>$request->vat,
            'subCharge'=>$request->subCharge,
            'total'=>$request->total,
        ]);

        return redirect()->route('trade_license_abedon.index');
    }

    public function tradeEcomname(Request $request){
        $ecomname = TradeLicenseAbedon::where('ecomname','=',$request->ecomname)->first();


        if(empty($ecomname)){
            return 'one';
            //return response()->json(['statusClass' => 'has-success', 'statusMark' => 'glyphicon-ok','statusText'=>'']);
        }
        else
            return 'two';
    }

    public function trade_license_form_dash(){
        return view('pages.dashboard.trade_license_abedon.form');
    }

    public function trade_license_sonod_search(Request $request){
        $sonod = TradeLicenseAbedon::where('status','=',1)
        ->where('sonod_no','=',$request->sonod_no)->first();

        return $sonod;
    }

    public function trade_license_kor_aday(Request $request){
        $tax= TradeLicenseAbedon::where('bb_wordno',$request->word_no)
            ->where('taxid',$request->taxid)
            ->where('dokanNo',$request->dokanNo)
            ->where('btalikaNo',$request->btalikaNo)
            ->get();

        return $tax;
    }


}
