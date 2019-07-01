<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarishSonodAbedonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warish_sonod_abedons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('delivery_type')->nullable();
            $table->string('nationid')->nullable();
            $table->string('bcno')->nullable();
            $table->string('pno')->nullable();
            $table->string('dofb')->nullable();
            $table->string('ename')->nullable();
            $table->string('bname')->nullable();
            $table->string('gender')->nullable();
            $table->string('mstatus')->nullable();
            $table->string('eWname')->nullable();
            $table->string('bWname')->nullable();
            $table->string('eHname')->nullable();
            $table->string('bHname')->nullable();
            $table->string('efname')->nullable();
            $table->string('bfname')->nullable();
            $table->string('emname')->nullable();
            $table->string('bmane')->nullable();
            $table->string('flive')->nullable();
            $table->string('fyears')->nullable();
            $table->string('mlive')->nullable();
            $table->string('myears')->nullable();
            $table->string('ocupt')->nullable();
            $table->string('bashinda')->nullable();
            $table->string('p_gram')->nullable();
            $table->string('p_rbs')->nullable();
            $table->string('p_wordno')->nullable();
            $table->string('p_dis')->nullable();
            $table->string('p_thana')->nullable();
            $table->string('p_postof')->nullable();
            $table->string('pb_gram')->nullable();
            $table->string('pb_rbs')->nullable();
            $table->string('pb_wordno')->nullable();
            $table->string('pb_dis')->nullable();
            $table->string('pb_thana')->nullable();
            $table->string('pb_postof')->nullable();
            $table->string('per_gram')->nullable();
            $table->string('per_rbs')->nullable();
            $table->string('per_wordno')->nullable();
            $table->string('per_dis')->nullable();
            $table->string('per_thana')->nullable();
            $table->string('per_postof')->nullable();
            $table->string('perb_gram')->nullable();
            $table->string('perb_rbs')->nullable();
            $table->string('perb_wordno')->nullable();
            $table->string('perb_dis')->nullable();
            $table->string('perb_thana')->nullable();
            $table->string('perb_postof')->nullable();
            $table->string('english_applicant_name')->nullable();
            $table->string('bangla_applicant_name')->nullable();
            $table->string('english_applicant_father_name')->nullable();
            $table->string('bangla_applicant_father_name')->nullable();
            $table->string('mob')->nullable();
            $table->string('email')->nullable();
            $table->string('warishname')->nullable();
            $table->string('warishrel')->nullable();
            $table->string('warishage')->nullable();
            $table->string('nwarish')->nullable();
            $table->string('name')->nullable();
            $table->string('rel')->nullable();
            $table->string('age')->nullable();
            $table->string('token')->nullable();
            $table->string('status')->nullable();
            $table->string('fee')->nullable();
            $table->string('acno')->nullable();
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
        Schema::dropIfExists('warish_sonod_abedons');
    }
}
