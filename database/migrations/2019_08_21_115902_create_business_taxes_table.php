<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ownerEname')->nullable();
            $table->string('ownerBname')->nullable();
            $table->string('efname')->nullable();
            $table->string('bfname')->nullable();
            $table->string('emname')->nullable();
            $table->string('bmname')->nullable();
            $table->string('postOffice')->nullable();
            $table->string('gram')->nullable();
            $table->integer('word_no')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('roomNo')->nullable();
            $table->string('business_type')->nullable();
            $table->string('tax_start_date')->nullable();
            $table->string('last_tax_pay_date')->nullable();
            $table->string('mob')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('business_taxes');
    }
}
