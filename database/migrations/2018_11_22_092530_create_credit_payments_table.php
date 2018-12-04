<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balance_id')->unsigned();
            $table->integer('credit_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('cash')->unsigned();
            $table->integer('cheque')->unsigned();
            $table->integer('card')->unsigned();
            $table->integer('value')->unsigned();
            $table->timestamps();

            //Relations
            $table->foreign('balance_id')->references('id')->on('balances')->onUpdate('cascade');
            $table->foreign('credit_id')->references('id')->on('credits')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_payments');
    }
}
