<?php

namespace App\Http\Controllers;

use App\TaxClass;
use Illuminate\Http\Request;

class TaxClassController extends Controller
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
        return view('pages.dashboard.setup_menu.tax_class.create');
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
            'tax_class'      => 'required|string',

        ]);
        $tax_class =  new TaxClass();
        $tax_class->tax_class = $request->tax_class;
        $tax_class->status = 1;
        $tax_class->save();
    }

    public function taxClassShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'tax_class',
            2 => 'updated_at',
            3 => 'status',
            4 => 'action',

        );

        $totalData = TaxClass::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $TaxClass = TaxClass::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $TaxClass =  TaxClass::where('tax_class','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = TaxClass::where('tax_class','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($TaxClass))
        {
            foreach ($TaxClass as $key => $value)
            {
                $nestedData['id'] =$key+1;
                $nestedData['tax_class'] = $value->tax_class;
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

    public function taxClass_name(Request $request){
        $tax_class = TaxClass::where('tax_class',$request->tax_class)->first();

        if(empty($tax_class)){
            return 'one';
        }
        else
            return 'two';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaxClass  $taxClass
     * @return \Illuminate\Http\Response
     */
    public function show(TaxClass $taxClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaxClass  $taxClass
     * @return \Illuminate\Http\Response
     */
    public function edit(TaxClass $taxClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaxClass  $taxClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxClass $taxClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaxClass  $taxClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxClass $taxClass)
    {
        //
    }
}
