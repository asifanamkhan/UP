<?php

namespace App\Http\Controllers\sdc;

use App\SdgChartCount;
use App\Tax;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SdcBidhobaController extends Controller
{
    public function sdcBidhobaVataGrohon(){
        return view('pages.front_end.sdc.bidhoba.vataGrohonkari');
    }

    public function sdcBidhobaVataGrohonShow(Request $request){
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
                ->where('bidhoba_vata',1)
                ->where('gender','female')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->where('bidhoba_vata',1)
                ->where('gender','female')
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
                ->where('bidhoba_vata',1)
                ->where('gender','female')
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

        foreach ($tax as $key => $value)
        {
            $nestedData['id'] = $key+1;
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

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function sdcBidhobaVataBonchito(){
        return view('pages.front_end.sdc.bidhoba.vataBonchito');
    }

    public function sdcBidhobaVataBonchitoShow(Request $request){

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
                ->where('bidhoba_vata',2)
                ->where('gender','female')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->where('bidhoba_vata',2)
                ->where('gender','female')
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
                ->where('bidhoba_vata',2)
                ->where('gender','female')
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

        foreach ($tax as $key => $value)
        {
            $nestedData['id'] = $key+1;
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

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function sdcBidhobaVataGrohonChart(){
        $result = SdgChartCount::select('bidhoba_vata_grohon','year')->get();
        $tax= Tax::where('gender','female')
            ->where('bidhoba_vata',1)
            ->count();
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$tax]);
    }

    public function sdcBidhobaVataBonchitoChart(){
        $result = SdgChartCount::select('bidhoba_vata_bonchito','year')->get();
        $tax= Tax::where('gender','female')
            ->where('bidhoba_vata',2)
            ->count();
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$tax]);
    }
}
