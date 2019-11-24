<?php

namespace App\Http\Controllers;

use App\WarishGonTalika;
use App\WarishSonodAbedon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class WarishSonodAbedonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WarishSonodAbedon=WarishSonodAbedon::all();
        return view('pages.dashboard.warish_sonod_abedon.warish_sonod_abedon_dash',compact('WarishSonodAbedon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.front_end.abedon_potro.warish_sonod_abedon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //WarishSonodAbedon::create($request->all());
        $token = time().mt_rand(100, 999);
        $warish =  new WarishSonodAbedon();

        $warish->delivery_type = $request->delivery_type ;
        $warish->nationid = $request->nationid ;
        $warish->bcno = $request->bcno ;
        $warish->pno = $request->pno ;
        $warish->dofb = $request->dofb ;
        $warish->ename = $request->ename ;
        $warish->bname = $request->bname ;
        $warish->gender = $request->gender ;
        $warish->mstatus = $request->mstatus ;
        $warish->eWname = $request->eWname ;
        $warish->bWname = $request->bWname ;
        $warish->eHname = $request->eHname ;
        $warish->bHname = $request->bHname ;
        $warish->efname = $request->efname ;
        $warish->bfname = $request->bfname ;
        $warish->emname = $request->emname ;
        $warish->bmane = $request->bmane ;
        $warish->flive = $request->flive ;
        $warish->fyears = $request->fyears ;
        $warish->mlive = $request->mlive ;
        $warish->myears = $request->myears ;
        $warish->ocupt = $request->ocupt ;
        $warish->bashinda = $request->bashinda ;
        $warish->p_gram = $request->p_gram ;
        $warish->p_rbs = $request->p_rbs ;
        $warish->p_wordno = $request->p_wordno ;
        $warish->p_dis = $request->p_dis ;
        $warish->p_thana = $request->p_thana ;
        $warish->p_postof = $request->p_postof ;
        $warish->pb_gram = $request->pb_gram ;
        $warish->pb_rbs = $request->pb_rbs ;
        $warish->pb_wordno = $request->pb_wordno ;
        $warish->pb_dis = $request->pb_dis ;
        $warish->pb_thana = $request->pb_thana ;
        $warish->pb_postof = $request->pb_postof ;
        $warish->per_gram = $request->per_gram ;
        $warish->per_rbs = $request->per_rbs ;
        $warish->per_wordno = $request->per_wordno ;
        $warish->per_dis = $request->per_dis ;
        $warish->per_thana = $request->per_thana ;
        $warish->per_postof = $request->per_postof ;
        $warish->perb_gram = $request->perb_gram ;
        $warish->perb_rbs = $request->perb_rbs ;
        $warish->perb_wordno = $request->perb_wordno ;
        $warish->perb_dis = $request->perb_dis ;
        $warish->perb_thana = $request->perb_thana ;
        $warish->perb_postof = $request->perb_postof ;
        $warish->english_applicant_name = $request->english_applicant_name ;
        $warish->bangla_applicant_name = $request->bangla_applicant_name ;
        $warish->english_applicant_father_name = $request->english_applicant_father_name ;
        $warish->bangla_applicant_father_name = $request->bangla_applicant_father_name ;
        $warish->mob = $request->mob ;
        $warish->email = $request->email ;
        $warish->token = $token ;

        $warish->save();


        for ($i=0; $i < count($request->warishname) ; $i++) {
            $warishGonTalika = new WarishGonTalika();

            $warishGonTalika->warishname = $request->warishname[$i];
            $warishGonTalika->warishrel = $request->warishrel[$i];
            $warishGonTalika->warishage = $request->warishage[$i];
            $warishGonTalika->token = $token;

            $warishGonTalika->save();

        }

        return back()->with('success','Information added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function show(WarishSonodAbedon $warishSonodAbedon)
    {
        return view('pages.dashboard.warish_sonod_abedon.warish_sonod_show',compact('warishSonodAbedon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function edit(WarishSonodAbedon $warishSonodAbedon)
    {
        return view('pages.dashboard.warish_sonod_abedon.warish_sonod_edit',compact('warishSonodAbedon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarishSonodAbedon $warishSonodAbedon)
    {
        $warishSonodAbedon->update($request->all());
        return redirect()->route('warish_sonod_abedon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WarishSonodAbedon  $warishSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarishSonodAbedon $warishSonodAbedon)
    {
        $warishSonodAbedon->delete();
        return redirect()->route('warish_sonod_abedon.index');

    }

    public function warishAbedonIndex(Request $request){


        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'token',
            3 => 'id',
            4 => 'delivery_type',
            5 => 'mob',
            6 => 'created_at',
            7 => 'certificates',
            8 => 'money_receipt',

        );

        $totalData = WarishSonodAbedon::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            if($request->is_days == 2){



                $date1 = Carbon::today()->toDateString();
                $date2 = Carbon::today()->subDays(1)->toDateString();
                $warishAbedon = WarishSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $warishAbedon = WarishSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $warishAbedon = WarishSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $warishAbedon = WarishSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $warishAbedon = WarishSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $warishAbedon =  WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($warishAbedon))
        {
            foreach ($warishAbedon as $key => $value)
            {
                if($value->status == 1){
                    $nestedData['id'] = $key + 1;
                    $nestedData['bname'] = $value->bname;
                    $nestedData['token'] = $value->token;
                    $nestedData['id'] = $key + 1;
                    if($value->delivery_type == 1){
                        $nestedData['delivery_type'] = 'জরুরী';
                    }
                    elseif ($value->delivery_type == 2){
                        $nestedData['delivery_type'] = 'অতি জরুরী';
                    }
                    else{
                        $nestedData['delivery_type'] = 'সাধারন';
                    }
                    $nestedData['mob'] = $value->mob;
                    $nestedData['created_at'] = $value->created_at->toDateString();
                    $nestedData['certificates'] = '<div class="">
                                                    <a href="#"><button class="btn-sm btn-info">বাংলা</button></a>
                                                    <a href="#"><button class="btn-sm btn-primary">ইংরেজী</button></a>
                                                </div>';
                    $nestedData['money_receipt'] = '<div class="">
                                                    <a href="#"><button class="btn-sm btn-success">Print</button></a>
                                                </div>';

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

    public function New_warish_abedon(){
        return view('pages.dashboard.warish_sonod_abedon.new_warish_abedon_dash');
    }
    public function NewWarishAbedonIndex(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'token',
            3 => 'delivery_type',
            4 => 'mob',
            5 => 'created_at',
            6 => 'certificates',

        );

        $totalData = WarishSonodAbedon::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $WarishAbedon = WarishSonodAbedon::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $WarishAbedon =  WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = WarishSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($WarishAbedon))
        {
            foreach ($WarishAbedon as $key => $value)
            {
                if($value->status == 0){
                    $nestedData['id'] = $value->iteration;
                    $nestedData['bname'] = $value->bname;
                    $nestedData['token'] = $value->token;
                    $nestedData['id'] = $key + 1;
                    if($value->delivery_type == 1){
                        $nestedData['delivery_type'] = 'জরুরী';
                    }
                    elseif ($value->delivery_type == 2){
                        $nestedData['delivery_type'] = 'অতি জরুরী';
                    }
                    else{
                        $nestedData['delivery_type'] = 'সাধারন';
                    }
                    $nestedData['mob'] = $value->mob;
                    $nestedData['created_at'] = $value->created_at->toDateString();
                    $nestedData['certificates'] = ' <div class="btn-group">
                                    <a href="'.route('NewWarishSonodFeeDash',$value->id) .'" class="btn btn-primary btn-sm" title="Generate">
                                        Genetrate
                                    </a>
                                </div>';
                    $data[] = $nestedData;
                }

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

    public function NewWarishSonodFeeDash($id){
        $fee = WarishSonodAbedon::find($id);
        return view('pages.dashboard.warish_sonod_abedon.warish_abedon_fee',compact('fee'));
    }
    public function warishSonodFee(Request $request,$id){

        $fee = WarishSonodAbedon::find($id);
//        $nagorikFee->fee = $request->fee;
//        $nagorikFee->acno = $request->acno;

        $fee->update([
            'status'=>1,
            'fee'=>$request->fee,
            'acno'=>$request->acno,
        ]);

        return redirect()->route('warish_sonod_abedon.index');
    }
}
