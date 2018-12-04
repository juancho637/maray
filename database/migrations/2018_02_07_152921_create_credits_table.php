<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balance_id')->unsigned();
            $table->integer('purchase_order_id')->unsigned();
            $table->integer('state_id')->unsigned()->default(1);
            $table->integer('value')->unsigned();
            $table->integer('outstanding_balance')->unsigned();
            $table->text('description')->nullable();
            $table->timestamps();

            //Relations
            $table->foreign('balance_id')->references('id')->on('balances')->onUpdate('cascade');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
