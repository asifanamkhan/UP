<?php

namespace App\Http\Controllers;

use App\BosotVitarDhoron;
use Illuminate\Http\Request;

class BosotVitarDhoronController extends Controller
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
        return view('pages.dashboard.bosot_vitar_dhoron.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',

        ]);
        BosotVitarDhoron::create($request->all());
        return redirect()->back();

    }
    public function bosotVitarDhoronShow(Request $request){

        $columns = array(
            0 =>'id',
            1 =>'name',
            2 => 'updated_at',
            3 => 'action',

        );

        $totalData = BosotVitarDhoron::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $BosotVitarDhoron = BosotVitarDhoron::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $BosotVitarDhoron =  BosotVitarDhoron::where('name','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BosotVitarDhoron::where('name','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($BosotVitarDhoron))
        {
            foreach ($BosotVitarDhoron as $key => $value)
            {
                $nestedData['id'] = $value->id;
                $nestedData['name'] = $value->name;
                $nestedData['updated_at'] = $value->updated_at->toDateString() ;
                $nestedData['action'] = ' <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-sm" id="edit" title="edit">
                                   <i class="fa fa-edit"></i> Edit
                                </a>
                            </div>';
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

    public function bosot_vitar_name(Request $request){
        $name = BosotVitarDhoron::where('name',$request->name)->first();

        if(empty($name)){
            return 'one';
        }
        else
            return 'two';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BosotVitarDhoron  $bosotVitarDhoron
     * @return \Illuminate\Http\Response
     */
    public function show(BosotVitarDhoron $bosotVitarDhoron)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BosotVitarDhoron  $bosotVitarDhoron
     * @return \Illuminate\Http\Response
     */
    public function edit(BosotVitarDhoron $bosotVitarDhoron)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BosotVitarDhoron  $bosotVitarDhoron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BosotVitarDhoron $bosotVitarDhoron)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BosotVitarDhoron  $bosotVitarDhoron
     * @return \Illuminate\Http\Response
     */
    public function destroy(BosotVitarDhoron $bosotVitarDhoron)
    {
        //
    }
}
