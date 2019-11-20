<?php

namespace App\Http\Controllers;

use App\Mamla;
use Illuminate\Http\Request;

class MamlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mamla_count = Mamla::get('id')->count();
        $mamla = $mamla_count+1;

        return view('pages.dashboard.mamla.create',compact('mamla'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mamla = new Mamla();

        $mamla->create([
            'subject'      => $request->subject,
            'mamla_no'      => $request->mamla_no,
            'mamlar_date'   => $request->mamlar_date,
            'sunanir_date'   => $request->sunanir_date,
            'condition'   => $request->condition,
            'badi_name'  => implode("|",$request->badi_name),
            'badi_fname'  => implode("|",$request->badi_fname),
            'badi_gram'  => implode("|",$request->badi_gram),
            'bibadi_name'  => implode("|",$request->bibadi_name),
            'bibadi_fname'  => implode("|",$request->bibadi_fname),
            'bibadi_gram'  => implode("|",$request->bibadi_gram),

        ]);

        return redirect()->route('mamla.create');


    }

    public function mamlaShow(Request $request){

        $columns = array(
            0 =>'id',
            1 =>'id',
            2 => 'subject',
            3 => 'mamlar_date',
            4 => 'sunanir_date',
            5 => 'condition',
            6 => 'action',

        );

        $totalData = Mamla::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $mamla = Mamla::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $mamla =  Mamla::where('id','LIKE',"%{$search}%")
                ->orWhere('subject', 'LIKE',"%{$search}%")
                ->orWhere('mamlar_date', 'LIKE',"%{$search}%")
                ->orWhere('sunanir_date', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Mamla::where('id','LIKE',"%{$search}%")
                ->orWhere('subject', 'LIKE',"%{$search}%")
                ->orWhere('mamlar_date', 'LIKE',"%{$search}%")
                ->orWhere('sunanir_date', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($mamla))
        {
            foreach ($mamla as $key => $value)
            {
                $nestedData['id'] = $value->id;
                $nestedData['id'] = $value->id;
                $nestedData['subject'] = $value->subject;
                $nestedData['mamlar_date'] = $value->mamlar_date ;
                $nestedData['sunanir_date'] = $value->sunanir_date ;
                if($value->condition == 0){
                    $nestedData['condition'] = '<a href="" id="condition" class="btn-sm btn-primary " style="background-color: #d61313">
                                    চলমান
                                </a>';
                }
                elseif ($value->condition == 1){
                    $nestedData['condition'] = 'সম্পাদিত';
                }
                else{
                    $nestedData['condition'] = 'বাতিল';
                }
                $nestedData['action'] = ' <div class="btn-group">
                                <a href="'.route('NewNagorikSonodFeeDash',$value->id) .'" class="btn-sm btn-primary" style="background-color: #022241" title="Print">
                                    Print
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function show(Mamla $mamla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function edit(Mamla $mamla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mamla $mamla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mamla  $mamla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mamla $mamla)
    {
        //
    }
}
