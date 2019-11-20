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
        return view('pages.dashboard.setup_menu.bosot_vitar_dhoron.create');
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
            'bosot_vitar_dhoron'      => 'required|string',

        ]);
        $bosot_vitar_dhoron =  new BosotVitarDhoron();
        $bosot_vitar_dhoron->bosot_vitar_dhoron = $request->bosot_vitar_dhoron;
        $bosot_vitar_dhoron->status = 1;
        $bosot_vitar_dhoron->save();

    }
    public function bosotVitarDhoronShow(Request $request){

        $columns = array(
            0 =>'id',
            1 =>'bosot_vitar_dhoron',
            2 => 'updated_at',
            3 => 'status',
            4 => 'action',

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

            $BosotVitarDhoron =  BosotVitarDhoron::where('bosot_vitar_dhoron','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = BosotVitarDhoron::where('bosot_vitar_dhoron','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($BosotVitarDhoron))
        {
            foreach ($BosotVitarDhoron as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhoron;
                $nestedData['updated_at'] = date("d M Y",strtotime($value->updated_at));
                if($value->status==1){
                    $nestedData['status'] = '<p style="color: green">Enable</p>' ;
                }else{
                    $nestedData['status'] =  '<p style="color: red">Disable</p>';
                }
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
        $bosot_vitar_dhoron = BosotVitarDhoron::where('bosot_vitar_dhoron',$request->name)->first();

        if(empty($bosot_vitar_dhoron)){
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
