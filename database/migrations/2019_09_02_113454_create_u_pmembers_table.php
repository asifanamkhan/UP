<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUPmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_pmembers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->nullable();
            $table->string('designation')->nullable();
            $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->string('mstatus')->comment('1->bibahito,2->obibahito')->nullable();
            $table->string('nid')->nullable();
            $table->string('votar_no')->nullable();
            $table->string('pasport')->nullable();
            $table->string('occupation')->nullable();
            $table->string('masik_ay')->nullable();
            $table->string('sompod')->nullable();
            $table->date('join_date')->nullable();
            $table->date('sopoth_date')->nullable();
            $table->string('chele_meyer_songkha')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('present_address')->nullable();
            $table->string('post_address')->nullable();
            $table->string('mob')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('u_pmembers');
    }
}
