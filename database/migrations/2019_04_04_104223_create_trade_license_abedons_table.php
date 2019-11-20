<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeLicenseAbedonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_license_abedons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sonod_no')->nullable();
            $table->string('image')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('ownertype')->nullable();
            $table->string('dokanNo')->nullable();
            $table->string('btalikaNo')->nullable();
            $table->string('bazarName')->nullable();
            $table->string('business_type')->nullable();
            $table->string('last_tax_pay_date')->nullable();
            $table->string('tax_amount')->nullable();
            $table->string('ecomname')->nullable();
            $table->string('bcomname')->nullable();
            $table->string('ewname')->nullable();
            $table->string('bwname')->nullable();
            $table->string('gender')->nullable();
            $table->string('mstatus')->nullable();
            $table->string('efname')->nullable();
            $table->string('bfname')->nullable();
            $table->string('esname')->nullable();
            $table->string('bsname')->nullable();
            $table->string('emname')->nullable();
            $table->string('bmname')->nullable();
            $table->string('ncompany')->nullable();
            $table->string('vatid')->nullable();
            $table->string('taxid')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('be_gram')->nullable();
            $table->string('be_rbs')->nullable();
            $table->string('be_wordno')->nullable();
            $table->string('be_dis')->nullable();
            $table->string('be_thana')->nullable();
            $table->string('be_postof')->nullable();
            $table->string('bb_gram')->nullable();
            $table->string('bb_rbs')->nullable();
            $table->string('bb_wordno')->nullable();
            $table->string('bb_dis')->nullable();
            $table->string('bb_thana')->nullable();
            $table->string('bb_postof')->nullable();
            $table->string('mob')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('token')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('tax_start_date')->nullable();
            $table->string('status')->nullable();
            $table->string('endDate')->nullable();
            $table->string('tradeFee')->nullable();
            $table->string('signBoardTaxField')->nullable();
            $table->string('dueFee')->nullable();
            $table->string('suparishFee')->nullable();
            $table->string('vat')->nullable();
            $table->string('subCharge')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('trade_license_abedons');
    }
}
