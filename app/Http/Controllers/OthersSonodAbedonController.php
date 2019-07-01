<?php

namespace App\Http\Controllers;

use App\NagorikAbedon;
use App\OthersSonodAbedon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;

class OthersSonodAbedonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $others_sonod_abedon=OthersSonodAbedon::all();
        return view('pages.dashboard.others_sonod_abedon.others_sonod_abedon_dash',compact('others_sonod_abedon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.front_end.abedon_potro.others_sonod_abedon');
    }
    //mrittusonod
    public function mrittusonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.mrittu_sonod');
    }
    public function mrittusonoddash()
    {
        $mrittu_sonod_abedon=OthersSonodAbedon::all();
        return view('pages.dashboard.mrittu_sonod.mrittu_sonod_dash',compact('mrittu_sonod_abedon'));
    }
    public function mrittusonodshow($id)
    {

        $othersSonodAbedon =OthersSonodAbedon::find($id);
        return view('pages.dashboard.mrittu_sonod.mrittu_sonod_show',compact('othersSonodAbedon'));
    }
    public function mrittu_sonod_edit($id)
    {

        $othersSonodAbedon =OthersSonodAbedon::find($id);
        return view('pages.dashboard.mrittu_sonod.mrittu_sonod_edit',compact('othersSonodAbedon'));
    }


    //charitrik sonod
    public function charitrik_sonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.charitrik_sonod');
    }
    public function charitriksonoddash()
    {
        $charitrik_sonod_abedon=OthersSonodAbedon::all();
        return view('pages.dashboard.charitrik_sonod.charitrik_sonod_dash',compact('charitrik_sonod_abedon'));
    }
    public function charitriksonodshow($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.charitrik_sonod.charitrik_sonod_show',compact('othersSonodAbedon'));
    }
    public function charitrik_sonod_edit($id)
    {

        $othersSonodAbedon =OthersSonodAbedon::find($id);
        return view('pages.dashboard.charitrik_sonod.charitrik_sonod_edit',compact('othersSonodAbedon'));
    }


    //obibahito sonod
    public function obobahito_sonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.obobahito_sonod');
    }
    public function obibahitosonoddash()
    {
        $obibahito_sonod_abedon=OthersSonodAbedon::all();
        return view('pages.dashboard.obibahiho_sonod.obibahito_sonod_dash',compact('obibahito_sonod_abedon'));
    }
    public function obibahitosonodshow($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.obibahiho_sonod.obibahito_sonod_show',compact('othersSonodAbedon'));
    }
    public function obibahito_sonod_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.obibahiho_sonod.obibahito_edit',compact('othersSonodAbedon'));
    }

    //vumihin sonod
    public function vumihin_sonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.vumihin_sonod');
    }

    public function vumihinsonoddash()
    {
        $vumihin_sonod_abedon=OthersSonodAbedon::all();
        return view('pages.dashboard.vumihin_sonod.vumihin_sonod_dash',compact('vumihin_sonod_abedon'));
    }
    public function vumihinsonodshow($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.vumihin_sonod.vumihin_sonod_show',compact('othersSonodAbedon'));
    }
    public function vumihin_sonod_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.vumihin_sonod.vumihin_edit',compact('othersSonodAbedon'));
    }


//pun_bibah_na_howa
    public function pun_bibah_na_howa_sonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.pun_bibah_na_hoywa_sonod');
    }
    public function punbibahnasonoddash()
    {
        $pun_bibah_na_sonod=OthersSonodAbedon::all();
        return view('pages.dashboard.pun_bibah_na_sonod.pun_bibah_na_sonod_dash',compact('pun_bibah_na_sonod'));
    }
    public function pun_bibah_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.pun_bibah_na_sonod.pun_bibah_show',compact('othersSonodAbedon'));
    }
    public function pun_bibah_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.pun_bibah_na_sonod.pun_bibah_edit',compact('othersSonodAbedon'));
    }

//barshik income
    public function barshik_income()
    {
        return view('pages.front_end.abedon_potro.others_abedon.barshik_income');
    }
    public function barshikay()
    {
        $barshik_ay=OthersSonodAbedon::all();
        return view('pages.dashboard.barshik_ay.barshik_ay',compact('barshik_ay'));
    }
    public function barshik_ay_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.barshik_ay.barshik_ay_show',compact('othersSonodAbedon'));
    }
    public function barshik_ay_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.barshik_ay.barshik_ay_edit',compact('othersSonodAbedon'));
    }

//Eki name
    public function eki_name()
    {
        return view('pages.front_end.abedon_potro.others_abedon.eki_name');
    }
    public function akinamertalika()
    {
        $aki_namer_talika=OthersSonodAbedon::all();
        return view('pages.dashboard.aki_name_talika.aki_namer_talika',compact('aki_namer_talika'));
    }
    public function aki_namer_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.aki_name_talika.aki_namer_talika_show',compact('othersSonodAbedon'));
    }
    public function aki_namer_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.aki_name_talika.aki_namer_talika_edit',compact('othersSonodAbedon'));
    }

//bak srobon protibondhi
    public function bak_srobon_protibondhi()
    {
        return view('pages.front_end.abedon_potro.others_abedon.bak_srobon_protibondhi');
    }
    public function baksrobonprotibondhi()
    {
        $bak_srobon_protibondhi=OthersSonodAbedon::all();
        return view('pages.dashboard.bak_srobon_protibondhi.bak_srobon_protibondhi_dash',compact('bak_srobon_protibondhi'));
    }
    public function bak_srobon_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.bak_srobon_protibondhi.bak_srobon_show',compact('othersSonodAbedon'));
    }
    public function bak_srobon_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.bak_srobon_protibondhi.bak_srobon_edit',compact('othersSonodAbedon'));
    }

//sonaton dhoro
    public function sonaton_dhormo()
    {
        return view('pages.front_end.abedon_potro.others_abedon.sonaton_dhormo');
    }
    public function sonatondhormodash()
    {
        $sonaton_dhormo_dash=OthersSonodAbedon::all();
        return view('pages.dashboard.sonaton_dhormo_dash.sonaton_dhormo_dash',compact('sonaton_dhormo_dash'));
    }
    public function sonaton_dhormo_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.sonaton_dhormo_dash.sonaton_dhormo_show',compact('othersSonodAbedon'));
    }
    public function sonaton_dhormo_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.sonaton_dhormo_dash.sonaton_dhormo_edit',compact('othersSonodAbedon'));
    }

//onumoti porto
    public function onumoti_potro()
    {
        return view('pages.front_end.abedon_potro.others_abedon.onumoti_potro');
    }
    public function onumotiportodash()
    {
        $onumoti_potro_dash=OthersSonodAbedon::all();
        return view('pages.dashboard.onumuti_potro.onumoti_porto_dash',compact('onumoti_potro_dash'));
    }
    public function onumoti_potro_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.onumuti_potro.onumoti_potro_show',compact('othersSonodAbedon'));
    }
    public function onumoti_potro_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.onumuti_potro.onumoti_potro_edit',compact('othersSonodAbedon'));
    }


//prottyon potro
    public function prottyon_potro()
    {
        return view('pages.front_end.abedon_potro.others_abedon.prottyon_potro');
    }
    public function prottyonpotrodash()
    {
        $prottyon_potro_dash=OthersSonodAbedon::all();
        return view('pages.dashboard.prottyon_potro.prottyon_potro_dash',compact('prottyon_potro_dash'));
    }
    public function prottyon_potro_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.prottyon_potro.prottyon_potro_show',compact('othersSonodAbedon'));
    }
    public function prottyon_potro_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.prottyon_potro.prottyon_potro_edit',compact('othersSonodAbedon'));
    }


//muktijoddha sonod
    public function muktijoddha_sonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.muktijoddha_sonod');
    }
    public function muktijoddhasonoddash()
    {
        $muktijoddha_sonod_dash=OthersSonodAbedon::all();
        return view('pages.dashboard.muktijoddha_sonod.muktijoddha_sonod_dash',compact('muktijoddha_sonod_dash'));
    }
    public function muktijoddha_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.muktijoddha_sonod.muktijoddha_show',compact('othersSonodAbedon'));
    }
    public function muktijoddha_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.muktijoddha_sonod.muktijoddha_edit',compact('othersSonodAbedon'));
    }

//muktijoddhaposshosonoddash
    public function muktijoddha_possho_sonod()
    {
        return view('pages.front_end.abedon_potro.others_abedon.muktijoddha_possho_sonod');
    }
    public function muktijoddhaposshosonoddash()
    {
        $muktijoddha_possho_sonod_dash=OthersSonodAbedon::all();
        return view('pages.dashboard.muktijoddha_possho_sonod.muktijoddha_possho_sonod_dash',compact('muktijoddha_possho_sonod_dash'));
    }
    public function muktijoddha_possho_show($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.muktijoddha_possho_sonod.muktijoddha_possho_show',compact('othersSonodAbedon'));
    }
    public function muktijoddha_possho_edit($id)
    {
        $othersSonodAbedon=OthersSonodAbedon::find($id);
        return view('pages.dashboard.muktijoddha_possho_sonod.muktijoddha_possho_edit',compact('othersSonodAbedon'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OthersSonodAbedon::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OthersSonodAbedon  $othersSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function show(OthersSonodAbedon $othersSonodAbedon)
    {
        return view('pages.dashboard.others_sonod_abedon.others_sonod_show',compact('othersSonodAbedon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OthersSonodAbedon  $othersSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function edit(OthersSonodAbedon $othersSonodAbedon)
    {
        return view('pages.dashboard.others_sonod_abedon.others_abedon_edit',compact('othersSonodAbedon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OthersSonodAbedon  $othersSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OthersSonodAbedon $othersSonodAbedon)
    {
        $othersSonodAbedon->update($request->all());
        return redirect()->route('others_sonod_abedon.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OthersSonodAbedon  $othersSonodAbedon
     * @return \Illuminate\Http\Response
     */
    public function destroy(OthersSonodAbedon $othersSonodAbedon)
    {
        $othersSonodAbedon->delete();
        return redirect()->route('others_sonod_abedon.index');
    }


//others sonod index ajax
    public function othersAbedonIndex(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'bname',
            2 => 'token',
            3 => 'serviceList',
            4 => 'mob',
            5 => 'created_at',
            6 => 'certificates',

        );

        $totalData = OthersSonodAbedon::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $OthersSonodAbedon = OthersSonodAbedon::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $OthersSonodAbedon = OthersSonodAbedon::where('bname', 'LIKE', "%{$search}%")
                ->orWhere('token', 'LIKE', "%{$search}%")
                ->orWhere('serviceList', 'LIKE', "%{$search}%")
                ->orWhere('mob', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname', 'LIKE', "%{$search}%")
                ->orWhere('token', 'LIKE', "%{$search}%")
                ->orWhere('serviceList', 'LIKE', "%{$search}%")
                ->orWhere('mob', 'LIKE', "%{$search}%")
                ->count();
        }


        $data = array();

        if (!empty($OthersSonodAbedon)) {
            foreach ($OthersSonodAbedon as $key => $value) {
                if ($value->status == 0) {
                    $nestedData['id'] = $value->iteration;
                    $nestedData['bname'] = $value->bname;
                    $nestedData['token'] = $value->token;
                    $nestedData['id'] = $key + 1;
                    if ($value->serviceList == 1) {
                        $nestedData['serviceList'] = 'মৃত্যু সনদ';
                    } elseif ($value->serviceList == 2) {
                        $nestedData['serviceList'] = 'চারিত্রিক সনদ';
                    }
                    elseif ($value->serviceList == 3) {
                        $nestedData['serviceList'] = 'অবিবাহিত সনদ';
                    }
                    elseif ($value->serviceList == 4) {
                        $nestedData['serviceList'] = 'ভূমিহীন সনদ ফি ফরম';
                    }
                    elseif ($value->serviceList == 5) {
                        $nestedData['serviceList'] = 'পুনঃ বিবাহ না হওয়া সনদ';
                    }
                    elseif ($value->serviceList == 6) {
                        $nestedData['serviceList'] = 'বার্ষিক আয়ের প্রত্যয়ন সনদ';
                    }
                    elseif ($value->serviceList == 7) {
                        $nestedData['serviceList'] = 'একই নামের প্রত্যয়ন সনদ';
                    }
                    elseif ($value->serviceList == 8) {
                        $nestedData['serviceList'] = 'প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী সনদ';
                    }
                    elseif ($value->serviceList == 9) {
                        $nestedData['serviceList'] = 'সনাতন ধর্ম অবলম্বী সনদ';
                    }
                    elseif ($value->serviceList == 10) {
                        $nestedData['serviceList'] = 'অনুমতি পত্র সনদ';
                    }
                    elseif ($value->serviceList == 11) {
                        $nestedData['serviceList'] = 'প্রত্যয়ন পত্র সনদ';
                    }
                    elseif ($value->serviceList == 12) {
                        $nestedData['serviceList'] = 'মুক্তিযোদ্ধা সনদ';
                    }
                    elseif ($value->serviceList == 13) {
                        $nestedData['serviceList'] = 'মুক্তিযোদ্ধা পোষ্য সনদ';
                    }

                    $nestedData['mob'] = $value->mob;
                    $nestedData['created_at'] = $value->created_at->toDateString();
                    $nestedData['certificates'] = ' <div class="btn-group">
                                    <a href="' . route('NewOthersFeeDash', $value->id) . '" class="btn btn-primary btn-sm" title="Generate">
                                        Genetrate
                                    </a>
                                </div>';
                    $data[] = $nestedData;
                }

            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function NewOthersFeeDash($id){
        $fee = OthersSonodAbedon::find($id);
        return view('pages.dashboard.others_sonod_abedon.fee',compact('fee'));
    }

    public function othersSonodFee(Request $request,$id){
        $fee = OthersSonodAbedon::find($id);

        $fee->update([
            'status'=>1,
            'fee'=>$request->fee,
            'acno'=>$request->acno,
        ]);

        if($fee->serviceList==1){
            return redirect()->route('mrittu_sonod_dash');
        }

        elseif($fee->serviceList==2){
            return redirect()->route('charitrik_sonod_dash');
        }

        elseif($fee->serviceList==3){
            return redirect()->route('obibahitosonoddash');
        }

        elseif($fee->serviceList==4){
            return redirect()->route('vumihinsonoddash');
        }

        elseif($fee->serviceList==5){
            return redirect()->route('punbibahnasonoddash');
        }

        elseif($fee->serviceList==6){
            return redirect()->route('barshikay');
        }

        elseif($fee->serviceList==7){
            return redirect()->route('akinamertalika');
        }

        elseif($fee->serviceList==8){
            return redirect()->route('baksrobonprotibondhi');
        }

        elseif($fee->serviceList==9){
            return redirect()->route('sonatondhormodash');
        }

        elseif($fee->serviceList==10){
            return redirect()->route('onumotiportodash');
        }

        elseif($fee->serviceList==11){
            return redirect()->route('prottyonpotrodash');
        }

        elseif($fee->serviceList==12){
            return redirect()->route('muktijoddhasonoddash');
        }

        else{
            return redirect()->route('muktijoddhaposshosonoddash');
        }


    }

    public function akiNameAbedon(Request $request){


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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==7){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);

    }

    public function bak_srobon_Abedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==8){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function barshikAyAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==6){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function charitrikAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==2){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function mrittuAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==1){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function muktijoddhaPosshoAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==13){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }
    public function muktijoddhaAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==12){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function obibahitoAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==3){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function onumotiAbedon(Request $request){
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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==10){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function prottyonAbedon(Request $request){
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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==11){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function punBibahAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==5){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function sonatonAbedon(Request $request){

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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==9){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

    public function vumiAbedon(Request $request){
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

        $totalData = OthersSonodAbedon::count();

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
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$date2, $date1])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==7){
                $today = Carbon::today()->toDateString();
                $two = Carbon::today()->subDays(6)->toDateString();
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),[$two, $today])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==30){
                $today = Carbon::today();
                $two = Carbon::today()->subDays(30);
                $Abedon = OthersSonodAbedon::whereBetween(DB::raw('DATE(created_at)'),array($two, $today))
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else if($request->is_days==1){
                $Abedon = OthersSonodAbedon::
                offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

            else{
                $Abedon = OthersSonodAbedon::where(DB::raw('DATE(created_at)'),$request->is_days)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }

        }
        else {
            $search = $request->input('search.value');

            $Abedon =  OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = OthersSonodAbedon::where('bname','LIKE',"%{$search}%")
                ->orWhere('token', 'LIKE',"%{$search}%")
                ->orWhere('id', 'LIKE',"%{$search}%")
                ->orWhere('delivery_type', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($Abedon))
        {
            foreach ($Abedon as $key => $value)
            {
                if($value->status == 1){
                    if($value->serviceList==4){
                        $nestedData['id'] = $key + 1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['token'] = $value->token;
                        $nestedData['id'] = $key +1 ;
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
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,

        );

        echo json_encode($json_data);
    }

}
