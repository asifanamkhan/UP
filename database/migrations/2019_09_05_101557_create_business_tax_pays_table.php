<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTaxPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_tax_pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ortho_year_payable')->nullable();
            $table->string('ortho_year_diff_count')->nullable();
            $table->string('tax_pay_date')->nullable();
            $table->string('money_recieve_no')->nullable();
            $table->double('total_money')->nullable();
            $table->double('moukuf')->nullable();
            $table->double('total_payable_amount')->nullable();
            $table->integer('word_no')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('roomNo')->nullable();
            $table->double('previous_tax_amount')->nullable();
            $table->string('last_tax_pay_date')->nullable();
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
        Schema::dropIfExists('business_tax_pays');
    }
}
