<?php

namespace App\Console;

use App\Doridro;
use App\Tax;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $tax =  Tax::groupBy('holding_no','word_no')
            ->selectRaw('*, sum(masik_ay) as pum')->get();

        $amount1 = Doridro::where('type',1)->first();
        $amount2 = Doridro::where('type',2)->first();

        //doridro poribar
        if(!empty($tax))
        {   $doridro_poribar=0;
            foreach ($tax as $key => $value)
            {
                if(!empty($value->pum)){
                    if((($amount2->amount) < ($value->pum)) &&(($amount1->amount) >= ($value->pum)) ){

                        $doridro_poribar++;
                    }
                }
            }
        }

        //hoto doridro poribar
        if(!empty($tax))
        {   $hoto_doridro_poribar=0;
            foreach ($tax as $key => $value)
            {
                if(!empty($value->pum)){
                    if($amount2->amount >= $value->pum  ){

                        $hoto_doridro_poribar++;
                    }
                }
            }
        }

        //0 to 5 age no birth certificate children
        $tax= Tax::where('member_no','!=',1)
            ->get();

        $no_birth_cer=1;
        foreach ($tax as $key => $value)
        {
            $presentYear= Carbon::now()->format('Y');
            $birthday =  substr($value->dob, 0,4);
            $diff = $presentYear-$birthday;
            if($diff<=5){
                $no_birth_cer++;
            }

        }
        //sanitation_dhoron
        $sanitation_dhoron=[];
        $san = Tax::where('member_no',1)->groupBy('sanitation_dhoron')->select('sanitation_dhoron', DB::raw('count(*) as total'))->get();
        foreach ($san as $sans){
            $sanitation_dhoron[$sans->sanitation_dhoron] =$sans->total ;
        }

        //14 to 18 nari
        $t1= Tax::where('gender','female')
            ->get();
        if(!empty($tax))
        {   $x=0;
            foreach ($tax as $key => $value)
            {
                $presentYear= Carbon::now()->format('Y');
                $birthday =  substr($value->dob, 0,4);
                $diff = $presentYear-$birthday;

                if(14<=$diff && 18>=$diff){
                    $x++;
                }

            }
        }

        $schedule->call(function () use ($doridro_poribar,$hoto_doridro_poribar,$no_birth_cer,$sanitation_dhoron){

            DB::table('sdg_chart_counts')->insert([
                'year'=> Carbon::now()->format('Y'),
                'oshikkhito_bekar'=> DB::table('taxes')->where('oshikkhito_bekar', 1)->count(),
                'shikkhito_bekar'=> DB::table('taxes')->where('shikkhito_bekar', 1)->count(),
                'sakkhorBihin15To45Age'=> DB::table('taxes')->where('sakkhorBihin', 1)->count(),
                'doridro_poribar'=> $doridro_poribar,
                'hoto_doridro_poribar'=> $hoto_doridro_poribar,
                'old_vata_grohon'=> DB::table('taxes')->where('old_vata', 1)->count(),
                'old_vata_bonchito'=> DB::table('taxes')->where('old_vata', 2)->count(),
                'old_vata_joggo_bonchito'=> DB::table('taxes')->where('oldVataBonchito', 1)->count(),
                'No_birth_cer_0_to_5_age'=> $no_birth_cer,
                'khorbito'=> DB::table('taxes')->where('khorbito', 1)->count(),
                'bidhoba_vata_grohon'=> DB::table('taxes')->where('gender','female')->where('bidhoba_vata',1)->count(),
                'bidhoba_vata_bonchito'=> DB::table('taxes')->where('gender','female')->where('bidhoba_vata',2)->count(),
                'biddut_subidha_grohon'=> DB::table('taxes')->where('member_no',1)->where('biddut_subidha',1)->count(),
                'biddut_subidha_bonchito'=> DB::table('taxes')->where('member_no',1)->where('biddut_subidha',2)->count(),
                'nirapod_pani_pan_kora'=> DB::table('taxes')->where('member_no',1)->where('clean_water',1)->count(),
                'nirapod_pani_pan_na_kora'=> DB::table('taxes')->where('member_no',1)->where('clean_water',2)->count(),
                'internate_subhidha_pawa'=> DB::table('taxes')->where('member_no',1)->where('internate',1)->count(),
                'internate_subhidha_na_pawa'=> DB::table('taxes')->where('member_no',1)->where('internate',2)->count(),
                'sastho_sommoto_sanitation_use'=> DB::table('taxes')->where('member_no',1)->where('satitation',1)->count(),
                'sastho_sommoto_sanitation_na_use'=> DB::table('taxes')->where('member_no',1)->where('satitation',2)->count(),
                'satitation_prithok_use'=> DB::table('taxes')->where('member_no',1)->where('satitation_prithok',1)->count(),
                'satitation_prithok_na_use'=> DB::table('taxes')->where('member_no',1)->where('satitation_prithok',2)->count(),
                'sanitation_dhoron'=> json_encode($sanitation_dhoron),
                'femaleMaleUtpadonshil'=> DB::table('taxes')->where('femaleMaleUtpadonshil',1)->count(),
                'freelancer'=> DB::table('taxes')->where('freelancer',1)->count(),
                'probashi'=> DB::table('taxes')->where('probashi',1)->count(),

            ]);

        });
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
