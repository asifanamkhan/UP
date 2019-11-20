<?php

namespace App\Http\Controllers;

use App\Education;
use App\NagorikAbedon;
use App\Occupation;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;

class NagorikAbedonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nagorikabedon=NagorikAbedon::all();
        return view('pages.dashboard.nagorik_abedon.nagorik_abedon_dash',compact('nagorikabedon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.front_end.abedon_potro.nagorik_abedon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $year = Carbon::now()->year;
        $sonod_no = $year . time().mt_rand(100, 999);
        if ($request->hasfile('image')){
            $images = $request->file('image');
                $attached  = str_random( 2 ) . time() . '.' . $images->getClientOriginalExtension();
                $destinationPath = public_path().'/images/';
                $images->move($destinationPath,$attached);

        }
        else{
            $attached = "";
        }
        $nagorikAbedon = NagorikAbedon::create($request->all());

        $img1 = $attached;
        $nagorikAbedon->update([
            'image'=>$img1,
            'sonod_no'=>$sonod_no,
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NagorikAbedon  $nagorikAbedon
     * @return \Illuminate\Http\Response
     */
    public function show(NagorikAbedon $nagorikAbedon)
    {
        return view('pages.dashboard.nagorik_abedon.nagorik_abedon_show',compact('nagorikAbedon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NagorikAbedon  $nagorikAbedon
     * @return \Illuminate\Http\Response
     */
    public function edit(NagorikAbedon $nagorikAbedon)
    {
        return view('pages.dashboard.nagorik_abedon.nagorik_abedon_edit',compact("nagorikAbedon"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NagorikAbedon  $nagorikAbedon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NagorikAbedon $nagorikAbedon)
    {
        $nagorikAbedon->update($request->all());
        return redirect()->route('nagorik_abedon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NagorikAbedon  $nagorikAbedon
     * @return \Illuminate\Http\Response
     */
    public function destroy(NagorikAbedon $nagorikAbedon)
    {
        $nagorikAbedon->delete();
        return redirect()->route('nagorik_abedon.index');
    }
    public function NagorikAbedon(){
        return view('pages.front_end.abedon_potro.nagorik_abedon');
    }
    public function nagorik_abedon_jachay(){
        return view('pages.front_end.abedon_jachay.nagorik_abedon_jachay');
    }

    public function nagorikNid(Request $request){

        $nid = NagorikAbedon::where('nationid','=',$request->nationid)->first();

       if(empty($nid)){
            return 'one';
       }
       else
           return 'two';

    }

    public function agorikAbedonIndex(Request $request){


        $columns = array(
            0 =>'image',
            1 =>'bname',
            2 => 'token',
            3 => 'sonod_no',
            4 => 'delivery_type',
            5 => 'mob',
            6 => 'created_at',
            7 => 'certificates',
            8 => 'money_receipt',

        );

        $totalData = NagorikAbedon::count();

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
                $NagorikAbedon = NagorikAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $NagorikAbedon = NagorikAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $NagorikAbedon = NagorikAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $NagorikAbedon = NagorikAbedon::
                    offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $NagorikAbedon = NagorikAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $NagorikAbedon =  NagorikAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('sonod_no', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = NagorikAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('sonod_no', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($NagorikAbedon))
        {
            foreach ($NagorikAbedon as $key => $value)
            {
               if($value->status == 1){
                   $nestedData['image'] = $nestedData['image'] = '<a class=""  href="'.url("images/$value->image").'"><img class="card-img" style="width: 45px;height: 45px"  src="'.url("images/$value->image").'"  alt=""></a>';
                   $nestedData['bname'] = $value->bname;
                   $nestedData['token'] = $value->token;
                   $nestedData['sonod_no'] = $value->sonod_no ;
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
                   $nestedData['created_at'] = $value->created_at->toDateString();
                   $nestedData['certificates'] = '<div class="">
                                                    <a href="#"><button class="btn-sm btn-info">বাংলা</button></a>
                                                    <a href="#"><button class="btn-sm btn-primary">ইংরেজী</button></a>
                                                </div>';
                   $nestedData['money_receipt'] = '<div class="">
                                                    <a href="'.route('nagorik_abedon.edit',$value->id).'"><button class="btn-sm btn-success">Print</button></a>
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

    public function New_nagorik_abedon(){
        return view('pages.dashboard.nagorik_abedon.new_nagorik_abedon_dash');
    }

    public function NewagorikAbedonIndex(Request $request){

        $columns = array(
            0 =>'image',
            1 =>'bname',
            2 => 'token',
            3 => 'delivery_type',
            4 => 'mob',
            5 => 'created_at',
            6 => 'certificates',

        );

        $totalData = NagorikAbedon::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $NagorikAbedon = NagorikAbedon::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $NagorikAbedon =  NagorikAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = NagorikAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($NagorikAbedon))
        {
            foreach ($NagorikAbedon as $key => $value)
            {
                if($value->status == 0){
                    $nestedData['image'] = '<a class=""  href="'.url("images/$value->image").'"><img class="card-img" style="width: 45px;height: 40px"  src="'.url("images/$value->image").'"  alt=""></a>';
                    $nestedData['bname'] = $value->bname;
                    $nestedData['token'] = $value->token;
                    $nestedData['id'] = $value->id ;
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
                    $nestedData['created_at'] = $value->created_at->toDateString();
                    $nestedData['certificates'] = ' <div class="btn-group">
                                    <a href="'.route('NewNagorikSonodFeeDash',$value->id) .'" class="btn btn-primary btn-sm" title="Generate">
                                        Genetrate
                                    </a>
                                </div>';
                    $data[] = $nestedData;
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

    public function nagorikSonodFee(Request $request,$id){
        $nagorikFee = NagorikAbedon::find($id);
        $nagorikFee->update([
            'status'=>$request->status,
            'fee'=>$request->fee,
            'acno'=>$request->acno,
        ]);

        return redirect()->route('nagorik_abedon.index');


    }

    public function NewNagorikSonodFeeDash($id){

        $nagorikFee = NagorikAbedon::find($id);
        return view('pages.dashboard.nagorik_abedon.nagorik_abedon_fee',compact('nagorikFee'));
    }

    public function nagorikMob(Request $request){
        $mob = NagorikAbedon::where('mob','=',$request->mob)->first();


        if(empty($mob)){
            return 'one';
            //return response()->json(['statusClass' => 'has-success', 'statusMark' => 'glyphicon-ok','statusText'=>'']);
        }
        else
            return 'two';
    }

    public function nagorikBcno(Request $request){
        $bcno = NagorikAbedon::where('bcno','=',$request->bcno)->first();


        if(empty($bcno)){
            return 'one';
            //return response()->json(['statusClass' => 'has-success', 'statusMark' => 'glyphicon-ok','statusText'=>'']);
        }
        else
            return 'two';
    }

    public function nagorikPno(Request $request){
        $pno = NagorikAbedon::where('pno','=',$request->pno)->first();


        if(empty($pno)){
            return 'one';
            //return response()->json(['statusClass' => 'has-success', 'statusMark' => 'glyphicon-ok','statusText'=>'']);
        }
        else
            return 'two';
    }

    public function nagorikFormDash(){
        return view('pages.dashboard.nagorik_abedon.form');
    }

    public function aaa(){
        return view('pages.aaaa');
    }

    public function nagorikValueRegfrom(Request $request){
        $tax = Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('member_no',$request->member_no)
            ->first();
        if(!empty($tax)){
            $occupation = Occupation::where('id',$tax->occupation)->first();
            $edu = Education::where('id',$tax->education)->first();
        }
        else{
            $occupation='';
            $edu='';
        }

        return [$tax,$occupation,$edu];

    }

    public function nagorikSonodPrint(Request $request){
        $tax = Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('member_no',$request->member_no)
            ->first();
        //dd($tax);

        return view('pages.front_end.print.nagorikSonodPrint',compact('tax'));
    }


}
