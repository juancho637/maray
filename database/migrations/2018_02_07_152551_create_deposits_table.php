<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('balance_id')->unsigned();
            $table->integer('balance_assigned_id')->unsigned()->nullable();
            $table->integer('purchase_order_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->default(1);
            $table->integer('cash')->default(0);
            $table->integer('cheque')->default(0);
            $table->integer('card')->default(0);
            $table->integer('total')->default(0);
            $table->timestamp('used_date')->nullable();
            $table->timestamps();

            //Relations
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
            $table->foreign('balance_id')->references('id')->on('balances')->onUpdate('cascade');
            $table->foreign('balance_assigned_id')->references('id')->on('balances')->onUpdate('cascade');
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
        Schema::dropIfExists('deposits');
    }
}
