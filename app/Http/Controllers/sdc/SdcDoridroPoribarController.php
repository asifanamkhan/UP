<?php

namespace App\Http\Controllers\sdc;

use App\Doridro;
use App\SdgChartCount;
use App\Tax;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SdcDoridroPoribarController extends Controller
{
    public function sdcDoridroPoribar(){
        return view('pages.front_end.sdc.doridroPoribar.doridro');
    }

    public function sdcDoridroShow(Request $request){
        $columns = array(
            0 =>'id',
            1 => 'bname',
            2 => 'bfname',
            3 => 'bmname',
            4 => 'b_gram',
            5 => 'occupation',
            6 => 'dob',
            7 => 'nid',
            8 => 'mob',
        );



        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax =  Tax::where('word_no',$request->word_no)
                ->groupBy('holding_no')
                ->selectRaw('*, sum(masik_ay) as pum')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->groupBy('holding_no')
                ->selectRaw('*, sum(masik_ay) as pum')
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%")
                        ->orWhere('nid','LIKE',"%{$search}%")
                        ->orWhere('mob','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Tax::where('word_no',$request->word_no)
                ->groupBy('holding_no')
                ->selectRaw('*, sum(masik_ay) as pum')
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%")
                        ->orWhere('nid','LIKE',"%{$search}%")
                        ->orWhere('mob','LIKE',"%{$search}%");
                })
                ->count();
        }

        $data = array();

        $amount1 = Doridro::where('type',1)->first();
        $amount2 = Doridro::where('type',2)->first();

        if(!empty($tax))
        {   $x=1;
            foreach ($tax as $key => $value)
            {
                if(!empty($value->pum)){
                    if((($amount2->amount) < ($value->pum)) &&(($amount1->amount) >= ($value->pum)) ){

                        $nestedData['id'] = $x++;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['bfname'] = $value->bfname;
                        $nestedData['bmname'] = $value->bmname;
                        $nestedData['b_gram'] = $value->b_gram;
                        $nestedData['occupation'] = $value->occupations->occupation;
                        $nestedData['dob'] = date("d M Y",strtotime($value->dob));
                        $nestedData['nid'] = $value->nid;
                        $nestedData['mob'] = $value->mob;
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

    public function sdchotoDoridroPoribar(){
        return view('pages.front_end.sdc.doridroPoribar.hotoDoridroPoribar');
    }

    public function sdchotoDoridroShow(Request $request){
        $columns = array(
            0 =>'id',
            1 => 'bname',
            2 => 'bfname',
            3 => 'bmname',
            4 => 'b_gram',
            5 => 'occupation',
            6 => 'dob',
            7 => 'nid',
            8 => 'mob',
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
                ->groupBy('holding_no')
                ->selectRaw('*, sum(masik_ay) as pum')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->groupBy('holding_no')
                ->selectRaw('*, sum(masik_ay) as pum')
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%")
                        ->orWhere('nid','LIKE',"%{$search}%")
                        ->orWhere('mob','LIKE',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Tax::where('word_no',$request->word_no)
                ->groupBy('holding_no')
                ->selectRaw('*, sum(masik_ay) as pum')
                ->where(function ($query) use ($search ) {
                    $query->where('bname','LIKE',"%{$search}%")
                        ->orWhere('bfname','LIKE',"%{$search}%")
                        ->orWhere('bmname','LIKE',"%{$search}%")
                        ->orWhere('b_gram','LIKE',"%{$search}%")
                        ->orWhere('nid','LIKE',"%{$search}%")
                        ->orWhere('mob','LIKE',"%{$search}%");
                })
                ->count();
        }

        $data = array();

        $amount = Doridro::where('type',2)->first();

        if(!empty($tax))
        {
            $x=1;
            foreach ($tax as $key => $value)
            {
                if(!empty($value->pum)){
                    if($amount->amount >= $value->pum  ){
                        $nestedData['id'] = $x++;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['bfname'] = $value->bfname;
                        $nestedData['bmname'] = $value->bmname;
                        $nestedData['b_gram'] = $value->b_gram;
                        $nestedData['occupation'] = $value->occupations->occupation;
                        $nestedData['dob'] = date("d M Y",strtotime($value->dob));
                        $nestedData['nid'] = $value->nid;
                        $nestedData['mob'] = $value->mob;
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

    public  function sdcDoridroChart(){
        $result = SdgChartCount::select('doridro_poribar','year')->get();

        $tax =  Tax::groupBy('holding_no','word_no')
            ->selectRaw('*, sum(masik_ay) as pum')->get();

        $amount1 = Doridro::where('type',1)->first();
        $amount2 = Doridro::where('type',2)->first();

        if(!empty($tax))
        {   $doridro_poribar=0;
            foreach ($tax as $key => $value)
            {
                if(!empty($value->pum)){
                    if((($amount2->amount) < ($value->pum)) &&(($amount1->amount) >= ($value->pum)) ){

                       $doridro_poribar++;
                    }
                }
            }
        }
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$doridro_poribar]);

    }

    public function sdcHotoDoridroChart(){
        $result = SdgChartCount::select('hoto_doridro_poribar','year')->get();

        $tax =  Tax::groupBy('holding_no','word_no')
            ->selectRaw('*, sum(masik_ay) as pum')->get();

        $amount = Doridro::where('type',2)->first();

        if(!empty($tax))
        {   $doridro_poribar=0;
            foreach ($tax as $key => $value)
            {
                if(!empty($value->pum)){
                    if($amount->amount >= $value->pum  ){

                        $doridro_poribar++;
                    }
                }
            }
        }
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$doridro_poribar]);
    }


}
