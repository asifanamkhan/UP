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
            $table->string('ref_name')->nullable();
            $table->string('tax_start_date')->nullable();
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
        Schema::dropIfExists('taxes');
    }
}
