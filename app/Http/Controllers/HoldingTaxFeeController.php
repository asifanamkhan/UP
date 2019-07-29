<?php

namespace App\Http\Controllers;

use App\BosotVitarDhoron;
use App\HoldicTaxPayment;
use App\HoldingTaxFee;
use App\Occupation;
use App\TaxClass;
use Illuminate\Http\Request;

class HoldingTaxFeeController extends Controller
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
        $bosot_vitar_dhoron = BosotVitarDhoron::all();
        $occupation = Occupation::all();
        $tax_class = TaxClass::all();

        return view('pages.dashboard.setup_menu.bosot_vitar_fee.create',compact('bosot_vitar_dhoron','occupation','tax_class'));
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
            'occupation'      => 'required|string',
            'tax_class'      => 'required|string',
            'tax_fee'      => 'required|numeric',

        ]);
        $holdingTaxFee =  new HoldingTaxFee();
        $holdingTaxFee->bosot_vitar_dhoron = $request->bosot_vitar_dhoron;
        $holdingTaxFee->occupation = $request->occupation;
        $holdingTaxFee->tax_class = $request->tax_class;
        $holdingTaxFee->tax_fee = $request->tax_fee;
        $holdingTaxFee->status = 1;
        $holdingTaxFee->save();
    }

    public function holdingTaxFeeShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'bosot_vitar_dhoron',
            2 =>'occupation',
            3 => 'tax_class',
            4 => 'tax_fee',
            5 => 'updated_at',
            6 => 'status',
            7 => 'action',

        );

        $totalData = HoldingTaxFee::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $HoldingTaxFee = HoldingTaxFee::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $HoldingTaxFee =  HoldingTaxFee::with('bosot_vitar_dhorons','occupations','tax_classs')
                ->where('bosot_vitar_dhoron','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('occupation', 'LIKE',"%{$search}%")
                ->orWhere('tax_class', 'LIKE',"%{$search}%")
                ->orWhere('tax_fee', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = HoldingTaxFee::with('bosot_vitar_dhorons','occupations','tax_classs')
                ->where('bosot_vitar_dhoron','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('occupation', 'LIKE',"%{$search}%")
                ->orWhere('tax_class', 'LIKE',"%{$search}%")
                ->orWhere('tax_fee', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($HoldingTaxFee))
        {
            foreach ($HoldingTaxFee as $key => $value)
            {
                $nestedData['id'] =$key+1;
                $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhorons->bosot_vitar_dhoron;
                $nestedData['occupation'] = $value->occupations->occupation;
                $nestedData['tax_class'] = $value->tax_classs->tax_class;
                $nestedData['tax_fee'] = $value->tax_fee;
                $nestedData['updated_at'] = $value->updated_at->toDateString() ;
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

        public function bosot_vitar_fee(Request $request){
            $bosot_vitar_fee = HoldingTaxFee::where('bosot_vitar_dhoron',$request->bosot_vitar_dhoron)
                ->where('occupation',$request->occupation)
                ->where('tax_class',$request->tax_class)
                ->first();

            if(empty($bosot_vitar_fee)){
                return 'one';
            }
            else
                return 'two';
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\HoldingTaxFee  $holdingTaxFee
     * @return \Illuminate\Http\Response
     */
    public function show(HoldingTaxFee $holdingTaxFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HoldingTaxFee  $holdingTaxFee
     * @return \Illuminate\Http\Response
     */
    public function edit(HoldingTaxFee $holdingTaxFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HoldingTaxFee  $holdingTaxFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HoldingTaxFee $holdingTaxFee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HoldingTaxFee  $holdingTaxFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoldingTaxFee $holdingTaxFee)
    {
        //
    }
}
