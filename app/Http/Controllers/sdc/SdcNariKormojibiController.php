<?php

namespace App\Http\Controllers\sdc;

use App\SdgChartCount;
use App\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SdcNariKormojibiController extends Controller
{
    public function sdcNariKormojibi(){
        return view('pages.front_end.sdc.nariUtpadonshil.talika');
    }

    public function sdcNariKormojibiShow(Request $request){
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
                ->where('femaleMaleUtpadonshil',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
                ->where('femaleMaleUtpadonshil',1)
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
                ->where('femaleMaleUtpadonshil',1)
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
        {
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,


        );

        echo json_encode($json_data);
    }

    public function sdc14To18Nari(){
        return view('pages.front_end.sdc.nari14To18.talika');
    }

    public function sdc14To18NariShow(Request $request){
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
                ->where('gender','female')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::where('word_no',$request->word_no)
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


        if(!empty($tax))
        {   $x=1;
            foreach ($tax as $key => $value)
            {
                $presentYear= Carbon::now()->format('Y');
                $birthday =  substr($value->dob, 0,4);
                $diff = $presentYear-$birthday;

                if(14<=$diff && 18>=$diff){
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

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,


        );

        echo json_encode($json_data);
    }

    public function sdcNariKormojibiChart(){
        $result = SdgChartCount::select('femaleMaleUtpadonshil','year')->get();
        $tax= Tax::where('femaleMaleUtpadonshil',1)
            ->count();
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$tax]);
    }

    public function sdc14To18NariChart(){
        $result = SdgChartCount::select('nari14To18','year')->get();
        $tax= Tax::where('gender','female')
            ->get();
        if(!empty($tax))
        {   $x=0;
            foreach ($tax as $key => $value)
            {
                $presentYear= Carbon::now()->format('Y');
                $birthday =  substr($value->dob, 0,4);
                $diff = $presentYear-$birthday;

                if(14<=$diff && 18>=$diff){
                    $x++;
                }

            }
        }
        $year = Carbon::now()->format('Y');
        return response()->json([$result,$year,$x]);
    }
}
