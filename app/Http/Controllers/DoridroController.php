<?php

namespace App\Http\Controllers;

use App\Doridro;
use Illuminate\Http\Request;

class DoridroController extends Controller
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
        return view('pages.dashboard.setup_menu.doridro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Doridro::updateOrCreate(
            ['id' => $request->id],
            ['type'=>$request->type,'amount' => $request->amount ]
       );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doridro  $doridro
     * @return \Illuminate\Http\Response
     */
    public function show(Doridro $doridro)
    {
        //
    }

    public function doridroShow(Request $request){
        $columns = array(
            0 =>'amount',
            2 => 'updated_at',

        );

        $totalData = Doridro::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $doridro = Doridro::where('type',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $doridro =  Doridro::where('type',1)
                ->where('amount','LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Doridro::where('type',1)
                ->where('amount','LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($doridro))
        {
            foreach ($doridro as $key => $value)
            {
                $nestedData['amount'] = $value->amount;
                $nestedData['updated_at'] = date("d M Y",strtotime($value->updated_at));
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

    public function hotoDoridroShow(Request $request){

        $columns = array(
            0 =>'amount',
            2 => 'updated_at',


        );

        $totalData = Doridro::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $doridro = Doridro::where('type',2)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $doridro =  Doridro::where('type',2)
                ->where('amount','LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Doridro::where('type',2)
                ->where('amount','LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($doridro))
        {
            foreach ($doridro as $key => $value)
            {
                $nestedData['amount'] = $value->amount;
                $nestedData['updated_at'] = date("d M Y",strtotime($value->updated_at));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doridro  $doridro
     * @return \Illuminate\Http\Response
     */
    public function edit(Doridro $doridro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doridro  $doridro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doridro $doridro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doridro  $doridro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doridro $doridro)
    {
        //
    }


}
