<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanijjikTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banijjik_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ownerEname')->nullable();
            $table->string('ownerBname')->nullable();
            $table->string('efname')->nullable();
            $table->string('bfname')->nullable();
            $table->string('emname')->nullable();
            $table->string('bmname')->nullable();
            $table->string('gram')->nullable();
            $table->integer('word_no')->nullable();
            $table->string('postOffice')->nullable();
            $table->integer('room_no')->nullable();
            $table->string('holding_no')->nullable();
            $table->double('mashik_vara')->nullable();
            $table->string('tax_start_date')->nullable();
            $table->string('last_tax_pay_date')->nullable();
            $table->string('date')->nullable();
            $table->string('mob')->nullable();
            $table->double('mashik_vara_tax')->nullable();
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
        Schema::dropIfExists('banijjik_taxes');
    }
}
