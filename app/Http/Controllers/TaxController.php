<?php

namespace App\Http\Controllers;

use App\BosotVitarDhoron;

use App\SanitationDhoron;
use App\Education;
use App\FamilyClass;
use App\HoldicTaxPayment;
use App\HoldingTaxFee;
use App\Occupation;
use App\Tax;
use App\TaxClass;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class TaxController extends Controller
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

    public function registrationForm(){
        $result = null;
        $bosot_vitar_dhoron = BosotVitarDhoron::all();
        $occa = Occupation::all();
        $tax_class = TaxClass::all();
        $education = Education::all();
        $poribar_class = FamilyClass::all();
        $sanitation_dhoron = SanitationDhoron::all();
        return view('pages.dashboard.tax.registrationForm',compact('result','bosot_vitar_dhoron','occa','tax_class','education','poribar_class','sanitation_dhoron'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

        $result = null;
        $bosot_vitar_dhoron = BosotVitarDhoron::all();
        $occa = Occupation::all();
        $tax_class = TaxClass::all();
        $education = Education::all();
        $poribar_class = FamilyClass::all();
        $sanitation_dhoron = SanitationDhoron::all();
        return view('pages.dashboard.tax.holding_tax',compact('result','bosot_vitar_dhoron','occa','tax_class','education','poribar_class','sanitation_dhoron'));
    }

    public function trade_license_tax(){
        return view('pages.dashboard.tax.trade_license_tax');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message =[
           'bname.0.required'=>'খানা প্রধানের নামে(বাংলায়) প্রদান করুন',
           'holding_no.required'=>'হোল্ডিং নাম্বার প্রদান করুন',
           'word_no.required'=>'ওয়ার্ড নং প্রদান করুন',
           'bfname.0.required'=>'পিতার নাম(বাংলায়) প্রদান করুন',
           'bmname.0.required'=>'মাতার নাম(বাংলায়) প্রদান করুন',
           'b_gram.required'=>'গ্রামের নাম(বাংলায়) প্রদান করুন',
           'gender.0.required'=>'Field is required',
           'dob.0.required'=>'Field is required',
           //'mob.0.required'=>'Field must be unique',
           'bosot_vitar_dhoron.required'=>'Field is required',
           'occupation.0.required'=>'Field is required',
           'tax_class.required'=>'Field is required',
           'tax_start_date.required'=>'Field is required',
           'last_tax_pay_date.required'=>'Field is required',

        ];

        $request->validate([

            'holding_no' => 'required|string',
            'word_no' => 'required|numeric',
            'bname' => 'required|array|min:1',
            'bname.*' => 'required|string',
            'bfname' => 'required|array|min:1',
            'bfname.*' => 'required|string',
            'bmname' => 'required|array|min:1',
            'bmname.*' => 'required|string',
            'gender' => 'required|array|min:1',
            'gender.*' => 'required|string',
            'b_gram' => 'required|string',
            'dob' => 'required|array|min:1',
            'dob.*' => 'required|string',
            'bosot_vitar_dhoron' => 'required|string',
            'occupation' => 'required|array|min:1',
            'occupation.*' => 'required|string',
            'tax_class' => 'required|string',
            'tax_start_date' => 'required|string',
            'last_tax_pay_date' => 'required|string',
            'mob' => 'array',
            'mob.*' => 'string|min:11|unique:taxes,mob',
            'email' => 'string|unique:taxes',


        ],$message);



        for ($i=0; $i < count($request->member_no) ; $i++) {

            $tax =  new Tax();

            $tax->member_no = $request->member_no[$i];

            $tax->holding_no = $request->holding_no;
            $tax->word_no = $request->word_no;
            $tax->status = 0;

            $tax->name = $request->name[$i];
            $tax->bname = $request->bname[$i];
            //$tax->efname = $request->efname[$i];
            $tax->bfname = $request->bfname[$i];
            //$tax->emname = $request->emname[$i];
            $tax->bmname = $request->bmname[$i];
            //$tax->e_gram = $request->e_gram;
            $tax->b_gram = $request->b_gram;
            //$tax->e_post = $request->e_post;
            $tax->b_post = $request->b_post;

            $tax->gender = $request->gender[$i];
            $tax->dob = $request->dob[$i];
            $tax->nid = $request->nid[$i];
            $tax->blood_group = $request->blood_group[$i];


            $tax->bosot_vitar_dhoron = $request->bosot_vitar_dhoron;
            $tax->tax_class = $request->tax_class;
            $tax->occupation = $request->occupation[$i];
            $tax->tax_amount = $request->tax_amount;

            $tax->education = $request->education;
            $tax->room_no = $request->room_no;
            $tax->barir_mullayon = $request->barir_mullayon;
            $tax->poribar_class = $request->poribar_class;
            $tax->tax_start_date = $request->tax_start_date;
            $tax->last_tax_pay_date = $request->last_tax_pay_date;

            $tax->mob = $request->mob[$i];
            $tax->email = $request->email;
            $tax->bank_acc_no = $request->bank_acc_no;

            $tax->freelancer_subject = $request->freelancer_subject[$i];
            $tax->freelancing_masik_ay = $request->freelancing_masik_ay[$i];

            $tax->birth_cer_no = $request->birth_cer_no[$i];

            $tax->bideshJeteKhoroch = $request->bideshJeteKhoroch[$i];
            $tax->bideshBarshikTkpathanorPoriman = $request->bideshBarshikTkpathanorPoriman[$i];

            $tax->nariTika = $request->nariTika;
            $tax->komOjonerShishu = $request->komOjonerShishu;
            $tax->schoolGomon = $request->schoolGomon;
            $tax->schoolNaJawarKaron = $request->schoolNaJawarKaron;
            $tax->gasLaganorJomi = $request->gasLaganorJomi;
            $tax->otiriktoJomi = $request->otiriktoJomi;
            $tax->karigoriSchool = $request->karigoriSchool;
            $tax->gorvotiMa = $request->gorvotiMa;
            $tax->gorvokalinSomoy = $request->gorvokalinSomoy;

            $tax->poribarer_jomir_poriman = $request->poribarer_jomir_poriman;
            $tax->masik_ay = $request->masik_ay[$i];
            //$tax->sodossoMasikAy = $request->sodossoMasikAy[$i];
            $tax->total_member_no = $request->total_member_no;
            $tax->male_member_no = $request->male_member_no;
            $tax->female_member_no = $request->female_member_no;
            //$tax->govt_member_no = $request->govt_member_no;
            $tax->sanitation_dhoron = $request->sanitation_dhoron;


            $old_vata='old_vata'.($i+1);
            $oldVataBonchito='oldVataBonchito'.($i+1);

            $bidhoba='bidhoba'.($i+1);
            $bidhoba_vata='bidhoba_vata'.($i+1);

            $birth_cer='birth_cer'.($i+1);

            $sakkhorBihin='sakkhorBihin'.($i+1);

            $shikkhito_bekar='shikkhito_bekar'.($i+1);
            $oshikkhito_bekar='oshikkhito_bekar'.($i+1);

            $probashi='probashi'.($i+1);
            $khorbito='khorbito'.($i+1);
            $protibondhi='protibondhi'.($i+1);
            $femaleMaleUtpadonshil='femaleMaleUtpadonshil'.($i+1);
            $freelancer='freelancer'.($i+1);

            $muktijoddha='muktijoddha'.($i+1);
            $muktijoddhaVata='muktijoddhaVata'.($i+1);


            $tax->bidhoba = $request->$bidhoba;
            $tax->bidhoba_vata = $request->$bidhoba_vata;

            $tax->old_vata = $request->$old_vata;
            $tax->birth_cer = $request->$birth_cer;

            $tax->shikkhito_bekar = $request->$shikkhito_bekar;
            $tax->oshikkhito_bekar = $request->$oshikkhito_bekar;

            $tax->sakkhorBihin = $request->$sakkhorBihin;

            $tax->muktijoddha = $request->$muktijoddha;
            $tax->muktijoddhaVata = $request->$muktijoddhaVata;

            $tax->probashi = $request->$probashi;
            $tax->khorbito = $request->$khorbito;
            $tax->protibondhi = $request->$protibondhi;
            $tax->femaleMaleUtpadonshil = $request->$femaleMaleUtpadonshil;
            $tax->freelancer = $request->$freelancer;
            $tax->oldVataBonchito = $request->$oldVataBonchito;

            $tax->clean_water = $request->clean_water;
            $tax->cleanWaterSource = $request->cleanWaterSource;
            $tax->internate = $request->internate;
            $tax->vumihin = $request->vumihin;
            $tax->satitation = $request->satitation;
            $tax->biddut_subidha = $request->biddut_subidha;
            $tax->satitation_prithok = $request->satitation_prithok;

            $tax->save();

        }
        return redirect()->back()->with('success','আপনার আবেদনটি গৃহীত হয়েছে');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        $bosot_vitar_dhoron=BosotVitarDhoron::all();
        $occa=Occupation::all();
        $tax_class=TaxClass::all();
        $education=Education::all();
        $poribar_class=FamilyClass::all();
        $sanitation_dhoron=SanitationDhoron::all();
        return view('pages.dashboard.tax.registrationFormEdit',compact('tax','bosot_vitar_dhoron','occa','tax_class','education','poribar_class','sanitation_dhoron'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        $tax->update($request->all());
        return back()->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //$tax = Tax::find($tax);
        $tax->delete();
//        return redirect()
//            ->route('business.expense.index')
//            ->with('warning', 'Deleted Successfully');
    }

    //bosot_kor_aday_table_ajax

    public function bosot_kor_aday(Request $request){


        $holding = Tax::with('tax_classs','bosot_vitar_dhorons','occupations')
            ->where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('member_no',1)
            ->get();

        $last_tax_pay_date = Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('member_no',1)
            ->pluck('last_tax_pay_date');

        $tax_amount = Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('member_no',1)
            ->first('tax_amount');

        $last_year = substr($last_tax_pay_date, 7,4);
       if(!empty($last_year)){
           $curent_month= Carbon::now()->format('m');
           if($curent_month>6){
               $curent_year = Carbon::now()->addYears(1)->format('Y');
           }
           else{
               $curent_year= Carbon::now()->format('Y');
           }
           $diff = (int)$curent_year-(int)$last_year;

           $amount = $diff*$tax_amount->tax_amount;
       }
       else{
           $amount = 'সর্বশেষ কর পরিষদের তথ্য পাওয়া যায়নি';

       }


        return ([$holding,$amount]);
    }

    //holding_tax_poriman
    public function holding_tax_poriman(Request $request){
        $amount = HoldingTaxFee::where('bosot_vitar_dhoron',$request->boshot_dhoron)
            ->where('occupation',$request->occa)
            ->where('tax_class',$request->tax_class)
            ->first('tax_fee');

            return $amount;
    }

    //bosot_member_no
    public function bosot_member_no(Request $request){
        $member_no_count = Tax::where('word_no','=',$request->word_no)
            ->where('holding_no','=',$request->holding_no)
            ->count();

        $member_no = Tax::where('word_no','=',$request->word_no)
            ->where('holding_no','=',$request->holding_no)
            ->first();

        $member_info =Tax::where('word_no','=',$request->word_no)
            ->where('holding_no','=',$request->holding_no)
            ->first();


        if(empty($member_no_count)){

            return 'one';
        }
        else
            return ([$member_no_count,$member_info,$member_no]);
    }

    public function holding_tax_pay($holding,$word,$member,$tax_amount){

        $payment = Tax::where('word_no',$word)
            ->where('holding_no',$holding)
            ->where('member_no',$member)->first();

        $last_year1 = substr($payment->last_tax_pay_date, 5,4);
        $last_year2 = $last_year1+1;

        return view('pages.dashboard.tax.holding_tax_payment',compact('payment','tax_amount','last_year1','last_year2'));
    }

    public function tax_assesment_form(){
        return view('pages.dashboard.tax.tax_assesment_form');
    }


    //holding_tax_payment

    public function holding_tax_payment(Request $request){

        $tax= Tax::where('holding_no',$request->holding_no)
                    ->where('word_no',$request->word_no)
                    ->first();

        $tax_amount = Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->where('member_no',1)
            ->first('tax_amount');

        $last_tax_pay_date_prev = substr($request->last_tax_pay_date, 5,4);
        $last_tax_pay_date1 = $last_tax_pay_date_prev + $request->ortho_year_payable;
        $last_tax_pay_date2 = ($last_tax_pay_date_prev + $request->ortho_year_payable)-1;
        $last_tax_pay_date = $last_tax_pay_date2 .'-'.$last_tax_pay_date1;
        $tax->update(['last_tax_pay_date'=>$last_tax_pay_date]);


        $last_year = substr($last_tax_pay_date, 5,4);
        if(!empty($last_year)){
            $curent_month= Carbon::now()->format('m');
            if($curent_month>6){
                $curent_year = Carbon::now()->addYears(1)->format('Y');
            }
            else{
                $curent_year= Carbon::now()->format('Y');
            }
            $diff = (int)$curent_year-(int)$last_year;

            $amount = $diff*$tax_amount->tax_amount;
        }
        else{
            $amount = 'সর্বশেষ কর পরিষদের তথ্য পাওয়া যায়নি';

        }


        HoldicTaxPayment::create($request->all());
        return redirect()->route('holding_tax_pay',[$request->holding_no,$request->word_no,1,$amount]);

    }

//holding_tax_pay_list

    public function holding_tax_pay_list(Request $request){


        $columns = array(
            0 =>'id',
            1 =>'tax_pay_date',
            2 =>'money_recieve_no',
            3 => 'last_tax_pay_date',
            4 => 'total_money',
            5 => 'moukuf',
            6 => 'total_payable_amount',
            7 => 'action',

        );

        $totalData = HoldicTaxPayment::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = HoldicTaxPayment::where('holding_no',$request->holding_no)
                ->where('word_no',$request->word_no)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  HoldicTaxPayment:: where('tax_pay_date','LIKE',"%{$search}%")
                ->orWhere('holding_no', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = Tax:: where('tax_pay_date','LIKE',"%{$search}%")
                ->orWhere('holding_no', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($tax))
        {
            foreach ($tax as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['tax_pay_date'] = date("d M Y",strtotime($value->created_at));
                $nestedData['money_recieve_no'] = $value->money_recieve_no;
                $nestedData['total_money'] = $value->total_money ;
                $nestedData['moukuf'] = $value->moukuf;
                $nestedData['total_payable_amount'] = $value->total_payable_amount;
                $nestedData['action'] = ' <div class="btn-group">
                                <a href="'.route('NewNagorikSonodFeeDash',$value->id) .'" class="btn btn-primary btn-sm" title="Generate">
                                    Edit
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

//taxAssesmentForm
    public function taxAssesmentForm(Request $request){

        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'holding_no',
            3 => 'bosot_vitar_dhoron',
            4 => 'room_no',
            5 => 'occupation',
            6 => 'tax_class',
            7 => 'tax_start_date',
            8 => 'tax_amount',

        );

        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = Tax::where('word_no',$request->word_no)
                ->where('member_no',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::with('bosot_vitar_dhorons','occupations','tax_classs')
                ->where('word_no',$request->word_no)
                ->where('member_no',1)
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
                $nestedData['id'] = $key+1;
                $nestedData['bname'] = $value->bname;
                $nestedData['holding_no'] = $value->holding_no ;
                if($value->bosot_vitar_dhoron!=0 && $value->bosot_vitar_dhoron!=''){
                    $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhorons->bosot_vitar_dhoron;
                }
                else{
                    $nestedData['bosot_vitar_dhoron'] = 'নাই';
                }
                $nestedData['room_no'] = $value->room_no;
                if($value->occupation!=0 && $value->occupation!=''){
                    $nestedData['occupation'] = $value->occupations->occupation;
                }
                else{
                    $nestedData['occupation'] = 'নাই';
                }
                if($value->tax_class!=0 && $value->tax_class!=''){
                    $nestedData['tax_class'] = $value->tax_classs->tax_class;
                }
                else{
                    $nestedData['tax_class'] = 'নাই';
                }
                $nestedData['tax_start_date'] = $value->tax_start_date;
                $nestedData['tax_amount'] = $value->tax_amount;
                $nestedData['action'] = ' <div class="btn-group">
                                <a href="'.route('tax.edit',$value->id) .'" class="btn btn-primary btn-sm " style="background-color: darkgreen" title="Generate">
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

    //tax dhari talika

    public function HoldingtaxDhariTalika(){
        return view('pages.dashboard.tax.tax_dhari_talika.holding_tax');
    }

    public function HoldingtaxDhariTalikaShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'holding_no',
            3 => 'bosot_vitar_dhoron',
            4 => 'room_no',
            5 => 'occupation',
            6 => 'tax_class',
            7 => 'tax_start_date',

        );

        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = Tax::where('word_no',$request->word_no)
                ->where('member_no',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::with('bosot_vitar_dhorons','occupations','tax_classs')
                ->where('word_no',$request->word_no)
                ->where('member_no',1)
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
                $nestedData['id'] = $key+1;
                $nestedData['bname'] = $value->bname;
                $nestedData['holding_no'] = $value->holding_no ;
                $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhorons->bosot_vitar_dhoron;
                $nestedData['room_no'] = $value->room_no;
                $nestedData['occupation'] = $value->occupations->occupation;
                $nestedData['tax_class'] = $value->tax_classs->tax_class;
                $nestedData['tax_start_date'] = $value->tax_start_date;
                $nestedData['tax_amount'] = $value->tax_amount;
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


    //print

    public function holding_Tax_print($word_no){
        $taxs = Tax::where('word_no',$word_no)
            ->where('member_no',1)
            ->get();
        $now = Carbon::now()->toDateString();
        $date=date("d M, Y",strtotime($now));

        return view('pages.dashboard.tax.tax_dhari_talika.holding_tax_print',compact('word_no','taxs','date'));

    }

    //tax Oandaye Talika

    public function holding_tax_onadayeTalika(){
        return view('pages.dashboard.tax.tax_onadaye_talika.holding_tax');
    }

    public  function taxOandayeTalikaShow(Request $request){
        $columns = array(
            0 =>'id',
            1 =>'bname',
            2 => 'holding_no',
            3 => 'bosot_vitar_dhoron',
            4 => 'room_no',
            5 => 'occupation',
            6 => 'tax_class',
            7 => 'last_tax_pay_date',

        );

        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {

            $tax = Tax::where('word_no',$request->word_no)
                ->where('member_no',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::with('bosot_vitar_dhorons','occupations','tax_classs')
                ->where('word_no',$request->word_no)
                ->where('member_no',1)
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
            $current_month= Carbon::now()->format('m');
            if($request->last_tax_pay_date==1) {
                if ($current_month > 6) {
                    foreach ($tax as $key => $value) {
                        $last_tax_pay_date = substr($value->last_tax_pay_date, 5, 4);
                        $currentYear = Carbon::now()->addYear(1)->format('Y');
                        if ($last_tax_pay_date < $currentYear) {
                            $nestedData['id'] = $key + 1;
                            $nestedData['bname'] = $value->bname;
                            $nestedData['holding_no'] = $value->holding_no;
                            $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhorons->bosot_vitar_dhoron;
                            $nestedData['room_no'] = $value->room_no;
                            $nestedData['occupation'] = $value->occupations->occupation;
                            $nestedData['tax_class'] = $value->tax_classs->tax_class;
                            $nestedData['tax_start_date'] = $value->last_tax_pay_date;
                            $nestedData['tax_amount'] = $value->tax_amount;
                            $data[] = $nestedData;
                        }
                    }

                }
                if ($current_month < 6) {
                    foreach ($tax as $key => $value) {
                        $last_tax_pay_date = substr($value->last_tax_pay_date, 5, 4);
                        $currentYear = Carbon::now()->format('Y');
                        if ($last_tax_pay_date < $currentYear) {
                            $nestedData['id'] = $key + 1;
                            $nestedData['bname'] = $value->bname;
                            $nestedData['holding_no'] = $value->holding_no;
                            $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhorons->bosot_vitar_dhoron;
                            $nestedData['room_no'] = $value->room_no;
                            $nestedData['occupation'] = $value->occupations->occupation;
                            $nestedData['tax_class'] = $value->tax_classs->tax_class;
                            $nestedData['tax_start_date'] = $value->last_tax_pay_date;
                            $nestedData['tax_amount'] = $value->tax_amount;
                            $data[] = $nestedData;
                        }
                    }
                }
            }
            else{
                foreach ($tax as $key => $value)
                {
                    if(($value->last_tax_pay_date) != ($request->last_tax_pay_date)){
                        $nestedData['id'] = $key+1;
                        $nestedData['bname'] = $value->bname;
                        $nestedData['holding_no'] = $value->holding_no ;
                        $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhorons->bosot_vitar_dhoron;
                        $nestedData['room_no'] = $value->room_no;
                        $nestedData['occupation'] = $value->occupations->occupation;
                        $nestedData['tax_class'] = $value->tax_classs->tax_class;
                        $nestedData['tax_start_date'] = $value->last_tax_pay_date;
                        $nestedData['tax_amount'] = $value->tax_amount;
                        $data[] = $nestedData;
                    }

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

    public function holding_Tax_onadaye_print($word_no,$last_tax_pay_date){


        $taxs = Tax::where('word_no',$word_no)
            ->where('member_no',1)
            ->where('last_tax_pay_date','!=',$last_tax_pay_date)
            ->get();
        $now = Carbon::now()->toDateString();
        $date=date("d M, Y",strtotime($now));

        return view('pages.dashboard.tax.tax_onadaye_talika.holding_tax_print',compact('word_no','taxs','date'));

    }

    //form validation

    public function word_holding_validation(Request $request){

        $tax=Tax::where('word_no',$request->word_no)
            ->where('holding_no',$request->holding_no)
            ->first();
        if(empty($tax)){
           return 'one';
        }
        else{
            return 'two';
        }
    }


    //frontendRegistration

    public function frontendRegistration(){
        $result = null;
        $bosot_vitar_dhoron = BosotVitarDhoron::all();
        $occa = Occupation::all();
        $tax_class = TaxClass::all();
        $education = Education::all();
        $poribar_class = FamilyClass::all();
        $sanitation_dhoron = SanitationDhoron::all();
        return view('pages.front_end.registrationForm',compact('result','bosot_vitar_dhoron','occa','tax_class','education','poribar_class','sanitation_dhoron'));
    }



}
