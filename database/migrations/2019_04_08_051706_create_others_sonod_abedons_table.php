<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersSonodAbedonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others_sonod_abedons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('incomeAmount')->nullable();
            $table->string('publishName')->nullable();
            $table->string('workPlace')->nullable();
            $table->string('ddfb')->nullable();
            $table->string('mukti_name')->nullable();
            $table->string('gejet_no')->nullable();
            $table->string('m_sonshod_sonod')->nullable();
            $table->string('sector')->nullable();
            $table->string('mukti_sonod')->nullable();
            $table->string('relation')->nullable();
            $table->string('short_rel')->nullable();
            $table->string('sector2')->nullable();
            $table->string('mukti_sonod2')->nullable();
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
            $table->string('ocupt')->nullable();
            $table->string('qualification')->nullable();
            $table->string('religion')->nullable();
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
            $table->string('mob')->nullable();
            $table->string('email')->nullable();
            $table->string('attachment')->nullable();
            $table->string('serviceList')->nullable();
            $table->string('token')->nullable();
            $table->string('status')->nullable();
            $table->string('fee')->nullable();
            $table->string('acno')->nullable();
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
        Schema::dropIfExists('others_sonod_abedons');
    }
}
