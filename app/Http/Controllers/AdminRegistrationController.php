<?php

namespace App\Http\Controllers;

use App\Tax;
use App\User;
use Illuminate\Http\Request;
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
}
