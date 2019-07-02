<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMamlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mamlas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mamla_no')->nullable();
            $table->string('subject')->nullable();
            $table->string('mamlar_date')->nullable();
            $table->string('sunanir_date')->nullable();
            $table->string('badi_name')->nullable();
            $table->string('badi_fname')->nullable();
            $table->string('badi_gram')->nullable();
            $table->string('bibadi_name')->nullable();
            $table->string('bibadi_fname')->nullable();
            $table->string('bibadi_gram')->nullable();
            $table->string('condition')->nullable();
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
        Schema::dropIfExists('mamlas');
    }
}
