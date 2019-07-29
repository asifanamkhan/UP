<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldicTaxPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holdic_tax_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ortho_year_payable')->nullable();
            $table->string('ortho_year_diff_count')->nullable();
            $table->string('money_recieve_no')->nullable();
            $table->string('total_money')->nullable();
            $table->string('moukuf')->nullable();
            $table->string('total_payable_amount')->nullable();
            $table->string('previous_tax_amount')->nullable();
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
        Schema::dropIfExists('holdic_tax_payments');
    }
}
