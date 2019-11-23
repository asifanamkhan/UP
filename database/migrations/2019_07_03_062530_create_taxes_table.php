<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->nullable();
            $table->double('member_no')->nullable();
            $table->string('holding_no');
            $table->integer('word_no');
            $table->integer('status');

            $table->string('name')->nullable();
            $table->string('bname')->nullable();
            $table->string('bfname')->nullable();
            $table->string('bmname')->nullable();
            $table->string('b_gram')->nullable();
            $table->string('b_post')->nullable();

            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('nid')->nullable();
            $table->string('blood_group')->nullable();

            $table->string('bosot_vitar_dhoron');
            $table->string('occupation');
            $table->string('tax_class');
            $table->double('tax_amount')->nullable();

            $table->string('education')->nullable();
            $table->integer('room_no')->nullable();
            $table->string('barir_mullayon')->nullable();
            $table->string('poribar_class')->nullable();
            $table->string('tax_start_date')->nullable();
            $table->string('last_tax_pay_date')->nullable();
            $table->string('mob')->nullable();
            $table->string('email')->nullable();
            $table->string('bank_acc_no')->nullable();

            $table->string('birth_cer')->nullable();
            $table->string('birth_cer_no')->nullable();

            $table->integer('old_vata')->nullable();
            $table->integer('oldVataBonchito')->nullable();

            $table->integer('bidhoba')->nullable();
            $table->integer('bidhoba_vata')->nullable();

            $table->integer('shikkhito_bekar')->nullable();
            $table->integer('oshikkhito_bekar')->nullable();

            $table->integer('freelancer')->nullable();
            $table->string('freelancer_subject')->nullable();
            $table->double('freelancing_masik_ay')->nullable();

            $table->string('sakkhorBihin')->nullable();

            $table->string('gorvotiMa')->nullable();
            $table->string('gorvokalinSomoy')->nullable();

            $table->integer('probashi')->nullable();
            $table->double('bideshJeteKhoroch')->nullable();
            $table->double('bideshBarshikTkpathanorPoriman')->nullable();

            $table->integer('nariTika')->nullable();
            $table->integer('protibondhi')->nullable();
            $table->integer('komOjonerShishu')->nullable();

            $table->integer('schoolGomon')->nullable();
            $table->string('schoolNaJawarKaron')->nullable();

            $table->integer('muktijoddha')->nullable();
            $table->integer('muktijoddhaVata')->nullable();

            $table->integer('gasLaganorJomi')->nullable();
            $table->integer('otiriktoJomi')->nullable();

            $table->integer('femaleMaleUtpadonshil')->nullable();
            $table->integer('karigoriSchool')->nullable();

            $table->string('poribarer_jomir_poriman')->nullable();
            $table->double('masik_ay')->nullable();
            $table->integer('sanitation_dhoron')->nullable();
            $table->string('total_member_no')->nullable();
            $table->double('male_member_no')->nullable();
            $table->double('female_member_no')->nullable();

            $table->integer('vumihin')->nullable();
            $table->integer('biddut_subidha')->nullable();
            $table->integer('clean_water')->nullable();
            $table->string('cleanWaterSource')->nullable();
            $table->integer('satitation')->nullable();
            $table->integer('satitation_prithok')->nullable();
            $table->integer('internate')->nullable();

            $table->integer('khorbito')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxes');
    }
}
