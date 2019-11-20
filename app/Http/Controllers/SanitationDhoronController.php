<?php

namespace App\Http\Controllers;

use App\SanitationDhoron;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SanitationDhoronController extends Controller
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
        return view('pages.dashboard.setup_menu.sanitationDhoron.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sanitation' => 'required|string|unique:sanitation_dhorons|max:255',
        ]);

        if ($validator->fails()) {
            return 'something';

        }

        $sanitation =  new SanitationDhoron();
        $sanitation->sanitation = $request->sanitation;
        $sanitation->status = 1;
        $sanitation->save();
    }

    public function sanitationShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'sanitation',
            2 => 'updated_at',
            3 => 'status',
            4 => 'action',

        );

        $totalData = SanitationDhoron::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $sanitationDhoron = SanitationDhoron::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $sanitationDhoron =  SanitationDhoron::where('sanitation','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = SanitationDhoron::where('sanitation','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($sanitationDhoron))
        {
            foreach ($sanitationDhoron as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['sanitation'] = $value->sanitation;
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

    public function sanitation_name(Request $request){
        $sanitationDhoron = SanitationDhoron::where('sanitation',$request->sanitation)->first();

        if(empty($sanitationDhoron)){
            return 'one';
        }
        else
            return 'two';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SanitationDhoron  $sanitationDhoron
     * @return \Illuminate\Http\Response
     */
    public function show(SanitationDhoron $sanitationDhoron)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SanitationDhoron  $sanitationDhoron
     * @return \Illuminate\Http\Response
     */
    public function edit(SanitationDhoron $sanitationDhoron)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SanitationDhoron  $sanitationDhoron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanitationDhoron $sanitationDhoron)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SanitationDhoron  $sanitationDhoron
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanitationDhoron $sanitationDhoron)
    {
        //
    }


}
