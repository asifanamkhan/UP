<?php

namespace App\Http\Controllers;

use App\Occupation;
use App\UPmember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class UPmemberController extends Controller
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
        $occa = Occupation::all();
        $up_member = Null;
        return view('pages.dashboard.setup_menu.up_member.create',compact('up_member','occa'));
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
            'designation'      => 'required|string',
            'fname'      => 'required|string',
            'occupation'      => 'required|string',
            'join_date'      => 'required|string',
            'present_address'      => 'required|string',
            'masik_ay'      => 'numeric',
            'chele_meyer_songkha'      => 'numeric',
            'email'      => 'required|email|unique:u_pmembers',
            'mob'      => 'required|string|min:11|unique:u_pmembers',
            'nid'      => 'string|unique:u_pmembers',
            'votar_no'      => 'string|unique:u_pmembers',
            'pasport'      => 'string|unique:u_pmembers',

        ]);

        if ($request->hasfile('image')){
            $images = $request->file('image');
            $attached  = str_random( 2 ) . time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path().'/images/';
            $images->move($destinationPath,$attached);

        }
        else{
            $attached = "";
        }
        $member =  new UPmember();
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->fname = $request->fname;
        $member->mstatus = $request->mstatus;
        $member->votar_no = $request->votar_no;
        $member->nid = $request->nid;
        $member->pasport = $request->pasport;
        $member->occupation = $request->occupation;
        $member->masik_ay = $request->masik_ay;
        $member->sompod = $request->sompod;
        $member->join_date = $request->join_date;
        $member->sopoth_date = $request->sopoth_date;
        $member->chele_meyer_songkha = $request->chele_meyer_songkha;
        $member->bank_acc_no = $request->bank_acc_no;
        $member->present_address = $request->present_address;
        $member->post_address = $request->post_address;
        $member->mob = $request->mob;
        $member->email = $request->email;
        $member->status = 1;

        $member->save();

        $img1 = $attached;
        $member->update([
            'image'=>$img1,

        ]);

        return redirect()->back()->with('success','member create successfully');
    }

    public function upmemberShow(Request $request){

        $columns = array(
            0 =>'image',
            1 =>'designation',
            2 =>'name',
            3 => 'nid',
            4 => 'mob',
            5 => 'join_date',
            6 => 'updated_at',
            7 => 'action',

        );

        $totalData = UPmember::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $member = UPmember::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $member =  UPmember::where('name','LIKE',"%{$search}%")
                ->orWhere('nid', 'LIKE',"%{$search}%")
                ->orWhere('date', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = UPmember::where('name','LIKE',"%{$search}%")
                ->orWhere('nid', 'LIKE',"%{$search}%")
                ->orWhere('date', 'LIKE',"%{$search}%")
                ->orWhere('mob', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($member))
        {
            foreach ($member as $key => $value)
            {
                if($value->status == 1){
                    $nestedData['id'] = $key+1;
                    $nestedData['image'] = '<a class=""  href="'.url("images/$value->image").'"><img class="card-img" style="width: 45px;height: 40px"  src="'.url("images/$value->image").'"  alt=""></a>';
                    if($value->designation==1){
                        $nestedData['designation'] = "চেয়ারম্যান";
                    }
                    else if ($value->designation==2){
                        $nestedData['designation'] = "মেম্বার";
                    }
                    else if ($value->designation==3){
                        $nestedData['designation'] = "সচিব";
                    }
                    else if ($value->designation==4){
                        $nestedData['designation'] = "গ্রাম পুলিশ";
                    }
                    else if ($value->designation==5){
                        $nestedData['designation'] = "উদ্যোক্তা";
                    }
                    $nestedData['name'] = $value->name;
                    $nestedData['nid'] = $value->nid;
                    $nestedData['mob'] = $value->mob;
                    $nestedData['join_date'] = $value->join_date  ;
                    if($value->status==1){
                        $nestedData['status'] = 'চলমান'  ;
                    }
                    else{
                        $nestedData['status'] = 'স্থগিত'  ;
                    }

                    $nestedData['action'] = ' <div class="btn-group">
                                    <a href="'.route('upmember.edit',$value->id) .'" class="btn btn-primary btn-sm" title="edit">
                                        Edit
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

    /**
     * Display the specified resource.
     *
     * @param  \App\UPmember  $uPmember
     * @return \Illuminate\Http\Response
     */
    public function show(UPmember $uPmember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UPmember  $uPmember
     * @return \Illuminate\Http\Response
     */
    public function edit(UPmember $upmember)
    {
        //dd($upmember);
        $occa = Occupation::all();
        return view('pages.dashboard.setup_menu.up_member.edit',compact('upmember','occa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UPmember  $uPmember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string',
            'designation'      => 'required|string',
            'fname'      => 'required|string',
            'occupation'      => 'required|string',
            'join_date'      => 'required|string',
            'present_address'      => 'required|string',
            'masik_ay'      => 'numeric',
            'chele_meyer_songkha'      => 'numeric',
            'email'      => 'required|email|unique:u_pmembers,email,'.$id,
            'mob'      => 'required|string|min:11|unique:u_pmembers,mob,'.$id,

        ]);

        if ($request->hasfile('image')){
            $images = $request->file('image');
            $attached  = str_random( 2 ) . time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path().'/images/';
            $images->move($destinationPath,$attached);

        }
        else{
            $attached = "";
        }
        $member =  UPmember::find($id);
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->fname = $request->fname;
        $member->mstatus = $request->mstatus;
        $member->votar_no = $request->votar_no;
        $member->nid = $request->nid;
        $member->pasport = $request->pasport;
        $member->occupation = $request->occupation;
        $member->masik_ay = $request->masik_ay;
        $member->sompod = $request->sompod;
        $member->join_date = $request->join_date;
        $member->sopoth_date = $request->sopoth_date;
        $member->chele_meyer_songkha = $request->chele_meyer_songkha;
        $member->bank_acc_no = $request->bank_acc_no;
        $member->present_address = $request->present_address;
        $member->post_address = $request->post_address;
        $member->mob = $request->mob;
        $member->email = $request->email;
        $member->status = 1;

        $member->update();

        $img1 = $attached;
        if($request->image==''){
            $member->update([
                'image'=>$request->oldImage,

            ]);
        }
        else{
            $member->update([
                'image'=>$img1,
            ]);
        }


        return redirect()->route('upmember.create')->with('success','member Updated successfully');
    }

    public function upMemberInfo($id){

        $up_member = UPmember::where('id',$id)->first();
        return view('pages.front_end.upMemberInfo',compact('up_member'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UPmember  $uPmember
     * @return \Illuminate\Http\Response
     */
    public function destroy(UPmember $uPmember)
    {
        //
    }
}
