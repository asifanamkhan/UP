<?php

namespace App\Http\Controllers\sdc;

use App\SdgChartCount;
use App\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SdcBekar15To29Controller extends Controller
{
    public function sdc15To29EduBekar(){
        return view('pages.front_end.sdc.Bekar15To29.shikkhito');
    }

    public function sdc15To29EduBekarShow(Request $request){
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
                ->where('shikkhito_bekar',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->where('shikkhito_bekar',1)
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
                ->where('shikkhito_bekar',1)
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


        if(!empty($tax))
        {   $x=1;
            foreach ($tax as $key => $value)
            {

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

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,


        );

        echo json_encode($json_data);
    }

    public function sdc15To29UnEduBekar(){
        return view('pages.front_end.sdc.Bekar15To29.oshikkhito');
    }

    public function sdc15To29UnEduBekarShow(Request $request){
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
                ->where('oshikkhito_bekar',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            //return response()->json($tax);
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->where('oshikkhito_bekar',1)
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
                ->where('oshikkhito_bekar',1)
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


        if(!empty($tax))
        {   $x=1;
            foreach ($tax as $key => $value)
            {

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

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,


        );

        echo json_encode($json_data);
    }

    public function sdc15To29UnEduBekarChart(){
        $result = SdgChartCount::select('oshikkhito_bekar','year')->get();
        $tax= Tax::where('oshikkhito_bekar',1)->count();
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$tax]);
    }
    public function sdc15To29EduBekarChart(){
        $result = SdgChartCount::select('shikkhito_bekar','year')->get();
        $tax= Tax::where('shikkhito_bekar',1)->count();
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$tax]);
    }
}
