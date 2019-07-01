<?php

namespace App\Http\Controllers;

use App\WarishSonodAbedon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class WarishSonodAbedonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WarishSonodAbedon=WarishSonodAbedon::all();
        return view('pages.dashboard.warish_sonod_abedon.warish_sonod_abedon_dash',compact('WarishSonodAbedon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.front_end.abedon_potro.warish_sonod_abedon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WarishSonodAbedon::create($request->all());
        return view('pages.front_end.abedon_potro.warish_sonod_abedon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function show(WarishSonodAbedon $warishSonodAbedon)
    {
        return view('pages.dashboard.warish_sonod_abedon.warish_sonod_show',compact('warishSonodAbedon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function edit(WarishSonodAbedon $warishSonodAbedon)
    {
        return view('pages.dashboard.warish_sonod_abedon.warish_sonod_edit',compact('warishSonodAbedon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarishSonodAbedon $warishSonodAbedon)
    {
        $warishSonodAbedon->update($request->all());
        return redirect()->route('warish_sonod_abedon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarishSonodAbedon $warishSonodAbedon)
    {
        $warishSonodAbedon->delete();
        return redirect()->route('warish_sonod_abedon.index');

    }

    public function warishAbedonIndex(Request $request){


        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'token',
            3 => 'id',
            4 => 'delivery_type',
            5 => 'mob',
            6 => 'created_at',
            7 => 'certificates',
            8 => 'money_receipt',

        );

        $totalData = WarishSonodAbedon::count();

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
                $warishAbedon = WarishSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $warishAbedon = WarishSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $warishAbedon = WarishSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $warishAbedon = WarishSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $warishAbedon = WarishSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $warishAbedon =  WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($warishAbedon))
        {
            foreach ($warishAbedon as $key => $value)
            {
                if($value->status == 1){
                    $nestedData['id'] = $key + 1;
                    $nestedData['bname'] = $value->bname;
                    $nestedData['token'] = $value->token;
                    $nestedData['id'] = $key + 1;
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

    public function New_warish_abedon(){
        return view('pages.dashboard.warish_sonod_abedon.new_warish_abedon_dash');
    }
    public function NewWarishAbedonIndex(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'token',
            3 => 'delivery_type',
            4 => 'mob',
            5 => 'created_at',
            6 => 'certificates',

        );

        $totalData = WarishSonodAbedon::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $WarishAbedon = WarishSonodAbedon::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $WarishAbedon =  WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($WarishAbedon))
        {
            foreach ($WarishAbedon as $key => $value)
            {
                if($value->status == 0){
                    $nestedData['id'] = $value->iteration;
                    $nestedData['bname'] = $value->bname;
                    $nestedData['token'] = $value->token;
                    $nestedData['id'] = $key + 1;
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
                                    <a href="'.route('NewWarishSonodFeeDash',$value->id) .'" class="btn btn-primary btn-sm" title="Generate">
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

    public function NewWarishSonodFeeDash($id){
        $fee = WarishSonodAbedon::find($id);
        return view('pages.dashboard.warish_sonod_abedon.warish_abedon_fee',compact('fee'));
    }
    public function warishSonodFee(Request $request,$id){

        $fee = WarishSonodAbedon::find($id);
//        $nagorikFee->fee = $request->fee;
//        $nagorikFee->acno = $request->acno;

        $fee->update([
            'status'=>1,
            'fee'=>$request->fee,
            'acno'=>$request->acno,
        ]);

        return redirect()->route('warish_sonod_abedon.index');
    }
}
