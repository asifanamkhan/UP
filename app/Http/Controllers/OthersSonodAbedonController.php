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

}
