<?php

namespace App\Http\Controllers\sonodPortoJachay;

use App\HoldicTaxPayment;
use App\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SonodHoldingTaxVerifyController extends Controller
{
    public function sonodHoldingTaxVerify(){

        return view('pages.front_end.sonod_potro_verify.holdingTaxVerify.verify');
    }

    public function holding_tax_pay($holding,$word,$member,$tax_amount){

        $payment = Tax::where('word_no',$word)
            ->where('holding_no',$holding)
            ->where('member_no',$member)->first();

        $last_year1 = substr($payment->last_tax_pay_date, 5,4);
        $last_year2 = $last_year1+1;


        return view('pages.front_end.sonod_potro_verify.holdingTaxVerify.payment',compact('payment','tax_amount','last_year1','last_year2'));
    }

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
        return redirect()->route('front/holding_tax_pay',[$request->holding_no,$request->word_no,1,$amount]);

    }
}
