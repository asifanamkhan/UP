<?php

namespace App\Http\Controllers;

use App\Notifications\MailSend;
use App\Tax;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\Permission;
use DB;


class AdminRegistrationController extends Controller
{
    public function roleCreate(){

        return view('pages.dashboard.adminRegistration.roleCreate');
    }

    public function adminCreate(Request $request){
        //dd($request->role_name);
        $role = new Role();
        $role->name=$request->role_name;
        $role->display_name='';
        $role->description=$request->description;

        $role->save();

        foreach ($request->permission_name as $permission) {
            $role->attachPermission($permission);
        }

        return redirect()->back();
    }

    public function userCreate(){
        return view('pages.dashboard.adminRegistration.userCreate');
    }

    public function roleShow(Request $request){
        $columns = array(
            0 =>'id',
            1 => 'name',
            2 => 'description',
            3 => 'updated_at',
            4 => 'action',

        );

        $totalData = Role::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = Role::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Role::where('name','LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Role::where('name','LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($tax))
        {
            foreach ($tax as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['name'] = $value->name;
                $nestedData['description'] = $value->description;
                $nestedData['updated_at'] = date("d M Y",strtotime($value->updated_at));
                $nestedData['action'] = '<a href="'.route('rolePermissionEdit',$value->id).'" class="btn-sm btn-success" style="color: darkgreen">Edit</a>';
                $data[] = $nestedData;

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

    public function userList(){
        return view('pages.dashboard.adminRegistration.userList');
    }

    public function userListShow(Request $request){
        $columns = array(
            0 =>'id',
            1 => 'name',
            2 => 'description',
        );

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = User::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  User::where('name','LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = User::where('name','LIKE',"%{$search}%")
                ->count();
        }

        $data = array();

        if(!empty($tax))
        {
            foreach ($tax as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['name'] = $value->name;
                $php = '';
                foreach ($value->roles as $role){
                    $php.= $role->name.' ';
                }
                $nestedData['role'] = $php;

                $data[] = $nestedData;
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

    public function rolePermissionEdit($id){
        $role = Role::find($id);

        $permissions = Permission::all();

        $role_permissions = $role->permissions()->pluck('id', 'id')->toArray();

        return view('pages.dashboard.adminRegistration.rolePermissionEdit',compact('role','role_permissions','permissions'));
    }

    public function adminUpdate(Request $request,$id){
        $role = Role::find($id);
        $role->name = $request->role_name;
        $role->description = $request->description;
        $role->save();
        //DB::table('permission_role')->where('role_id', $id)->delete();

        $role->syncPermissions($request->permission_name);

        return redirect()->back();

    }

    public function userAuthCreate(Request $data){

        $data->validate([
            'name'      => 'required|string|unique:users',
            'email'      => 'required|email',
            'password'      => 'required|min:6|confirmed',

        ]);

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),

        ]);
        $role = Role::find($data['role_name']);
        $user->attachRole($role);

        return redirect()->route('userList')->with('success','admin create successfully');
    }

    public function publicCreate(){
        return view('pages.dashboard.adminRegistration.publicCreate');
    }

    public function publicReg(Request $request){

        $tax = Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->first();

        return $tax;

    }

    public function userPublicCreate(Request $request){

        $request->validate([
                'name'      => 'required|string|min:11|unique:users',
                'email'      => 'required|email|unique:users',
                'password'      => 'required|min:6|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $role = Role::find(2);
            $user->attachRole($role);

            return redirect()->route('publicCreate')->with('success','Public create successfully');

    }

    public function publicShow(){
        return view('pages.dashboard.tax.publicShow');
    }

    public function publicInfo(Request $request){

        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 =>'bfame',
            3 =>'bmame',
            4 => 'holding_no',
            5 => 'b_gram',
            6 => 'mob',
            7 => 'occupation',
            8 => 'status',
            9 => 'Action',

        );

        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $query = Tax::query();
            if(isset($request->word_no)){
                $query ->where('word_no', $request->word_no);

            }
            if(isset($request->holding_no)){
                $query ->where('holding_no', $request->holding_no);

            }
            if(isset($request->member_no)){
                $query ->where('member_no', $request->member_no);

            }
            $tax = $query->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::with('bosot_vitar_dhorons','occupations','tax_classs')
                ->where('word_no',$request->word_no)
                ->where(function ($query) use ($search ) {
                    $query
                        ->where('bname','LIKE',"%{$search}%")
                        ->orWhere('holding_no', 'LIKE',"%{$search}%")
                        ->orWhere('tax_amount', 'LIKE',"%{$search}%")
                        ->orWhereHas('bosot_vitar_dhorons', function($query) use($search) {
                            $query->where('bosot_vitar_dhoron','LIKE',"%{$search}%");
                        })
                        ->orWhereHas('occupations', function($query) use($search) {
                            $query->where('occupation','LIKE',"%{$search}%");
                        })
                        ->orWhereHas('tax_classs', function($query) use($search) {
                            $query->where('tax_class','LIKE',"%{$search}%");
                        });
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Tax::where('word_no',$request->word_no)
                ->where('member_no',1)
                ->count();
        }


        $data = array();

        if(!empty($tax))
        {
            foreach ($tax as $key => $value)
            {
                $nestedData['bname'] = $value->bname;
                $nestedData['bfname'] = $value->bfname;
                $nestedData['bmname'] = $value->bmname;
                $nestedData['holding_no'] = $value->holding_no ;
                $nestedData['b_gram'] = $value->b_gram ;
                $nestedData['mob'] = $value->mob;
                if($value->occupation!=0 && $value->occupation!=''){
                    $nestedData['occupation'] = $value->occupations->occupation;
                }
                else{
                    $nestedData['occupation'] = 'নাই';
                }
                if($value->member_no == 1){
                    if($value->status == 0){
                        $nestedData['status'] = ' <div class="btn-group">
                                <a href="'.route('publicStatus',$value->id) .'" style="color:green;"  title="Generate">
                                    Deactivate
                                </a>
                               
                            </div>';
                    }
                    else{
                        $nestedData['status'] = ' <div class="btn-group">
                                <a href="'.route('publicStatus',$value->id) .'" class="btn btn-primary btn-sm "  title="Generate">
                                   Active 
                                </a>
            
                            </div>';
                    }
                }
                else{
                    $nestedData['status'] = '<p style="color: blue">নাই</p>';
                }

                $nestedData['action'] = ' <div class="btn-group">
                                <a href="'.route('tax.edit',$value->id) .'" class="btn btn-warning btn-sm " title="Generate">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button style="background-color: red" class="ml-1 btn btn-sm btn-danger btn-delete" data-remote=" '.route('tax.destroy',$value->id) .'" title="Delete">
                                   <i class="fa fa-trash"></i>
                                </button>
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

    public function publicStatus($id){

        $public = Tax::find($id);
        $status = null;
        return view('pages.dashboard.tax.publicStatus',compact('public','status'));
    }

    public function publicStatusChange(Request $request,$id){
        $request->validate([
            'status'      => 'required',
        ]);

        $tax = Tax::find($id);
        $tax->update([
            'status' => $request->status,
        ]);

        $user = User::where('name',$tax->mob)->first();

        if(!$user){
            $pass = mt_rand(100000, 999999);
            if($request->status==1){
                $users = User::create([
                    'name' => $tax->mob,
                    'email' => $tax->email,
                    'status' => $request->status,
                    'password' => Hash::make($pass),
                ]);
                $role = Role::find(2);
                $users->attachRole($role);

                $token = "ec8661ccc3a9ef8faa37a318c5afb44c";

                $url = "http://api.greenweb.com.bd/api.php";


                $data= array(
                    'to'=>"$tax->mob",
                    'message'=>"Congratulation $tax->bname. Your Account has been created successfully in http://unionparishadbd.com . \nUser name: $tax->mob , \nPassword: $pass  \nThank you for using our application",
                    'token'=>"$token"
                ); // Add parameters in key value
                $ch = curl_init(); // Initialize cURL
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
                $smsresult = curl_exec($ch);

                $users->email = 'somuddro249@gmail.com';   // This is the email you want to send to.
                $users->notify(new MailSend($tax->mob,$pass));
            }

        }
        else{
            $user->update([
                'status' => $request->status,
            ]);
        }

        return back()->with('success','status updated successfully');

    }
}
