<?php

namespace App\Http\Controllers\others_controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OthersSonodAbedon;
use Carbon\Carbon;
use DB;

class MuktijoddhaSonodController extends Controller
{
    //muktijoddha sonod
    public function muktijoddha_sonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.muktijoddha_sonod');
    }
    public function muktijoddhasonoddash()
    {
        $muktijoddha_sonod_dash=OthersSonodAbedon::all();
        return view('pages.dashboard.muktijoddha_sonod.muktijoddha_sonod_dash',compact('muktijoddha_sonod_dash'));
    }
    public function muktijoddha_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.muktijoddha_sonod.muktijoddha_show',compact('othersSonodAbedon'));
    }
    public function muktijoddha_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.muktijoddha_sonod.muktijoddha_edit',compact('othersSonodAbedon'));
    }

    public function muktijoddhaAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==12){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

}
