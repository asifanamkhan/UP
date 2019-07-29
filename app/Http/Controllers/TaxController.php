<?php

namespace App\Http\Controllers;

use App\BosotVitarDhoron;
use App\Education;
use App\FamilyClass;
use App\HoldicTaxPayment;
use App\HoldingTaxFee;
use App\Occupation;
use App\Tax;
use App\TaxClass;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        return view('pages.dashboard.tax.holding_tax',compact('result','bosot_vitar_dhoron','occa','tax_class','education','poribar_class'));
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




        for ($i=0; $i < count($request->name) ; $i++) {

            $tax =  new Tax();

            $tax->member_no = $request->member_no[$i];
            $tax->holding_no = $request->holding_no;
            $tax->word_no = $request->word_no;
            $tax->name = $request->name[$i];
            $tax->bname = $request->bname[$i];
            $tax->efname = $request->efname[$i];
            $tax->bfname = $request->bfname[$i];
            $tax->emname = $request->emname[$i];
            $tax->bmname = $request->bmname[$i];
            $tax->dob = $request->dob[$i];
            $tax->nid = $request->nid[$i];
            $tax->birth_cer_no = $request->birth_cer_no[$i];
            $tax->occupation = $request->occupation[$i];
            $tax->mob = $request->mob[$i];
            $tax->tax_amount = $request->tax_amount;
            $tax->ref_name = $request->ref_name[$i];
            $tax->e_gram = $request->e_gram;
            $tax->b_gram = $request->b_gram;
            $tax->e_post = $request->e_post;
            $tax->b_post = $request->b_post;
            $tax->bosot_vitar_dhoron = $request->bosot_vitar_dhoron;
            $tax->tax_class = $request->tax_class;
            $tax->tax_start_date = $request->tax_start_date;
            $tax->last_tax_pay_date = $request->last_tax_pay_date;
            $tax->education = $request->education;
            $tax->room_no = $request->room_no;
            $tax->barir_mullayon = $request->barir_mullayon;
            $tax->poribar_class = $request->poribar_class;
            $tax->abadi_jomir_poriman = $request->abadi_jomir_poriman;
            $tax->poribar_masik_ay = $request->poribar_masik_ay;
            $tax->total_member_no = $request->total_member_no;
            $tax->male_member_no = $request->male_member_no;
            $tax->female_member_no = $request->female_member_no;
            $tax->protibondhi_member_no = $request->protibondhi_member_no;
            $tax->female_worker_no = $request->female_worker_no;
            $tax->govt_member_no = $request->govt_member_no;
            $tax->vumihin = $request->vumihin;
            $tax->bidhoba = $request->bidhoba;
            $tax->bidhoba_no = $request->bidhoba_no;
            $tax->bidhoba_vata = $request->bidhoba_vata;
            $tax->train_bekar = $request->train_bekar;
            $tax->train_bekar_no = $request->train_bekar_no;
            $tax->old_vata = $request->old_vata;
            $tax->clean_water = $request->clean_water;
            $tax->internate = $request->internate;
            $tax->ref = $request->ref;
            $tax->birth_cer = $request->birth_cer[$i];


            $tax->save();
            return redirect()->back();

            //$product->product_name = $request->product_name[$i];
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //
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
        $member_no = Tax::where('word_no','=',$request->word_no)
            ->where('holding_no','=',$request->holding_no)
            ->count();
        $member_info =Tax::where('word_no','=',$request->word_no)
            ->where('holding_no','=',$request->holding_no)
            ->first();


        if(empty($member_no)){

            return 'one';
        }
        else
            return ([$member_no,$member_info]);
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
                $nestedData['tax_pay_date'] = $value->tax_pay_date;
                $nestedData['money_recieve_no'] = $value->money_recieve_no;
//                $last_year1 = substr($value->last_tax_pay_date, 0,4);
//                $last_year2 = substr($value->last_tax_pay_date, 5,4);
//                $last_year3 = $last_year1+1;
//                $last_year4 = $last_year2+1;
//                $year = '';
//                for ($i=0;$i<($value->ortho_year_payable);$i++){
//                    $year .= "(".$last_year3++.'-'.$last_year4++.')'.",";
//                }
//                $nestedData['last_tax_pay_date'] = $year;
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
            2 => 'word_no',
            3 => 'holding_no',
            4 => 'bosot_vitar_dhoron',
            5 => 'room_no',
            6 => 'occupation',
            7 => 'tax_class',
            8 => 'tax_start_date',
            9 => 'tax_amount',

        );

        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $tax = Tax::where('member_no',1)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $tax =  Tax::with('bosot_vitar_dhorons','occupations','tax_classs')
                ->where('bname','LIKE',"%{$search}%")
                ->orWhere('word_no', 'LIKE',"%{$search}%")
                ->orWhere('holding_no', 'LIKE',"%{$search}%")
                ->orWhere('tax_amount', 'LIKE',"%{$search}%")
                ->orWhere(function ($query) use($search) {
                    $query->whereHas('bosot_vitar_dhorons', function($query) use($search) {
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

            $totalFiltered = Tax::with('bosot_vitar_dhorons')
                ->where('bname','LIKE',"%{$search}%")
                ->orWhere('word_no', 'LIKE',"%{$search}%")
                ->orWhere('holding_no', 'LIKE',"%{$search}%")
                ->orWhere('bosot_vitar_dhoron', 'LIKE',"%{$search}%")
                ->orWhere('occupation', 'LIKE',"%{$search}%")
                ->orWhere('tax_class', 'LIKE',"%{$search}%")
                ->orWhere('tax_amount', 'LIKE',"%{$search}%")
                ->count();
        }


        $data = array();

        if(!empty($tax))
        {
            foreach ($tax as $key => $value)
            {
                $nestedData['id'] = $key+1;
                $nestedData['bname'] = $value->bname;
                $nestedData['word_no'] = $value->word_no;
                $nestedData['holding_no'] = $value->holding_no ;
                $nestedData['bosot_vitar_dhoron'] = $value->bosot_vitar_dhorons->bosot_vitar_dhoron;
                $nestedData['room_no'] = $value->room_no;
                $nestedData['occupation'] = $value->occupations->occupation;
                $nestedData['tax_class'] = $value->tax_classs->tax_class;
                $nestedData['tax_start_date'] = $value->tax_start_date;
                $nestedData['tax_amount'] = $value->tax_amount;
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




}
