<?php

namespace App\Http\Controllers;

use App\FamilyClass;
use Illuminate\Http\Request;

class FamilyClassController extends Controller
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
        return view('pages.dashboard.setup_menu.family_class.create');
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
            'poribar_class'      => 'required|string',

        ]);
        $familyClass =  new FamilyClass();
        $familyClass->poribar_class = $request->poribar_class;
        $familyClass->status = 1;
        $familyClass->save();
    }

    public function poribarClassShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'poribar_class',
            2 => 'updated_at',
            3 => 'status',
            4 => 'action',

        );

        $totalData = FamilyClass::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $poribar_class = FamilyClass::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $poribar_class =  FamilyClass::where('poribar_class','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = FamilyClass::where('poribar_class','LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($poribar_class))
        {
            foreach ($poribar_class as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['poribar_class'] = $value->poribar_class;
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

    public function poribar_class_name(Request $request){
        $poribar_class = FamilyClass::where('poribar_class',$request->poribar_class)->first();

        if(empty($poribar_class)){
            return 'one';
        }
        else
            return 'two';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamilyClass  $familyClass
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyClass $familyClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamilyClass  $familyClass
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyClass $familyClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamilyClass  $familyClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyClass $familyClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamilyClass  $familyClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyClass $familyClass)
    {
        //
    }
}
