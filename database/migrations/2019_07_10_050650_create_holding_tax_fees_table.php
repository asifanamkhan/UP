<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldingTaxFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holding_tax_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bosot_vitar_dhoron')->nullable();
            $table->string('occupation')->nullable();
            $table->string('tax_class')->nullable();
            $table->double('tax_fee')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('holding_tax_fees');
    }
}
