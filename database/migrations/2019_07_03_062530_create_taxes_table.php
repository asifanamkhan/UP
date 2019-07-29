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
            $table->string('name')->nullable();
            $table->string('member_no')->nullable();
            $table->string('token')->nullable();
            $table->string('bname')->nullable();
            $table->string('efname')->nullable();
            $table->string('bfname')->nullable();
            $table->string('emname')->nullable();
            $table->string('bmname')->nullable();
            $table->string('e_gram')->nullable();
            $table->string('b_gram')->nullable();
            $table->string('e_post')->nullable();
            $table->string('b_post')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('word_no')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_cer')->nullable();
            $table->string('boshot_dhoron')->nullable();
            $table->string('occa')->nullable();
            $table->string('tax_class')->nullable();
            $table->string('mob')->nullable();
            $table->string('tax_amount')->nullable();
            $table->string('ref_name')->nullable();
            $table->string('tax_start_date')->nullable();
            $table->string('last_tax_pay_date')->nullable();
            $table->string('education')->nullable();
            $table->string('room_no')->nullable();
            $table->string('barir_mullayon')->nullable();
            $table->string('poribar_class')->nullable();
            $table->string('abadi_jomir_poriman')->nullable();
            $table->string('poribar_masik_ay')->nullable();
            $table->string('total_member_no')->nullable();
            $table->string('male_member_no')->nullable();
            $table->string('female_member_no')->nullable();
            $table->string('protibondhi_member_no')->nullable();
            $table->string('female_worker_no')->nullable();
            $table->string('govt_member_no')->nullable();
            $table->string('vumihin')->nullable();
            $table->string('bidhoba')->nullable();
            $table->string('bidhoba_no')->nullable();
            $table->string('bidhoba_vata')->nullable();
            $table->string('train_bekar')->nullable();
            $table->string('train_bekar_no')->nullable();
            $table->string('old_vata')->nullable();
            $table->string('clean_water')->nullable();
            $table->string('birth_cer_no')->nullable();
            $table->string('internate')->nullable();
            $table->string('ref')->nullable();
            $table->string('dob')->nullable();

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
