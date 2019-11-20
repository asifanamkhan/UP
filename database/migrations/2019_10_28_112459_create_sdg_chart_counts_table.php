<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSdgChartCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdg_chart_counts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->integer('doridro_poribar')->nullable();
            $table->integer('hoto_doridro_poribar')->nullable();
            $table->integer('old_vata_grohon')->nullable();
            $table->integer('old_vata_bonchito')->nullable();
            $table->integer('old_vata_joggo_bonchito')->nullable();
            $table->integer('No_birth_cer_0_to_5_age')->nullable();
            $table->integer('khorbito')->nullable();
            $table->integer('bidhoba_vata_grohon')->nullable();
            $table->integer('bidhoba_vata_bonchito')->nullable();
            $table->integer('biddut_subidha_grohon')->nullable();
            $table->integer('biddut_subidha_bonchito')->nullable();
            $table->integer('shikkhito_bekar')->nullable();
            $table->integer('oshikkhito_bekar')->nullable();
            $table->integer('sakkhorBihin15To45Age')->nullable();
            $table->integer('nirapod_pani_pan_kora')->nullable();
            $table->integer('nirapod_pani_pan_na_kora')->nullable();
            $table->integer('internate_subhidha_pawa')->nullable();
            $table->integer('internate_subhidha_na_pawa')->nullable();
            $table->integer('sastho_sommoto_sanitation_use')->nullable();
            $table->integer('sastho_sommoto_sanitation_na_use')->nullable();
            $table->integer('satitation_prithok_use')->nullable();
            $table->integer('satitation_prithok_na_use')->nullable();
            $table->string('sanitation_dhoron');
            $table->integer('vumihin')->nullable();
            $table->integer('femaleMaleUtpadonshil')->nullable();
            $table->integer('nari14To18')->nullable();
            $table->integer('freelancer')->nullable();
            $table->integer('probashi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sdg_chart_counts');
    }
}
