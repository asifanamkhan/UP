<?php

namespace App\Http\Controllers\sdc;

use App\SdgChartCount;
use App\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ZeroToFiveAgeController extends Controller
{
    public function sdc0To5AgeNoBirthCerShishu(){
        return view('pages.front_end.sdc.ZeroToFiveAge.noBirthCer');
    }

    public function sdc0To5AgeNoBirthCerShishuShow(Request $request){
        $columns = array(
            0 =>'id',
            1 => 'bname',
            2 => 'bfname',
            3 => 'bmname',
            4 => 'b_gram',
            5 => 'dob',
        );


        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = Tax::where('word_no',$request->word_no)
                ->where('birth_cer',2)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->where('birth_cer',2)
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Tax::where('word_no',$request->word_no)
                ->where('birth_cer',2)
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%");
                })
                ->count();
        }

        $data = array();

        if(!empty($tax))
        {
            $x=1;
            foreach ($tax as $key => $value)
            {
                $presentYear= Carbon::now()->format('Y');
                $birthday =  substr($value->dob, 0,4);
                $diff = $presentYear-$birthday;
                if($diff<=5){

                    $nestedData['id'] = $x++;
                    $nestedData['bname'] = $value->bname;
                    $nestedData['bfname'] = $value->bfname;
                    $nestedData['bmname'] = $value->bmname;
                    $nestedData['b_gram'] = $value->b_gram;
                    $nestedData['dob'] = date("d M Y",strtotime($value->dob));
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

    public function sdc0To5AgeKhorbitoShishu(){
        return view('pages.front_end.sdc.ZeroToFiveAge.khorbito');
    }

    public function sdc0To5AgeKhorbitoShishuShow(Request $request){

        $columns = array(
            0 =>'id',
            1 => 'bname',
            2 => 'bfname',
            3 => 'bmname',
            4 => 'b_gram',
            5 => 'dob',
        );


        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = Tax::where('word_no',$request->word_no)
                ->where('khorbito',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->where('khorbito',1)
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Tax::where('word_no',$request->word_no)
                ->where('khorbito',1)
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%");
                })
                ->count();
        }

        $data = array();

        if(!empty($tax))
        {
            $x=1;
            foreach ($tax as $key => $value)
            {
                $presentYear= Carbon::now()->format('Y');
                $birthday =  substr($value->dob, 0,4);
                $diff = $presentYear-$birthday;
                if($diff<=5){

                    $nestedData['id'] = $x++;
                    $nestedData['bname'] = $value->bname;
                    $nestedData['bfname'] = $value->bfname;
                    $nestedData['bmname'] = $value->bmname;
                    $nestedData['b_gram'] = $value->b_gram;
                    $nestedData['dob'] = date("d M Y",strtotime($value->dob));
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

    public function sdc0To5AgeNoBirthCerShishuChart(){
        $result = SdgChartCount::select('No_birth_cer_0_to_5_age','year')->get();
        $tax= Tax::where('birth_cer',2)->get();
        $x=1;
        foreach ($tax as $key => $value)
        {
            $presentYear= Carbon::now()->format('Y');
            $birthday =  substr($value->dob, 0,4);
            $diff = $presentYear-$birthday;
            if($diff<=5){
                $x++;
            }
        }
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$x]);
    }

    public function sdcKhorbitoShishuChart(){
        $result = SdgChartCount::select('khorbito','year')->get();
        $tax= Tax::where('khorbito',1)->count();
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$tax]);
    }
}


