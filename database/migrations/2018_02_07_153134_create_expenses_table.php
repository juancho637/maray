<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('balance_id')->unsigned();
            $table->integer('purchase_order_id')->unsigned()->nullable();
            $table->integer('expense_type_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->default(1);
            $table->integer('cash')->unsigned();
            $table->integer('card')->unsigned();
            $table->integer('cheque')->unsigned();
            $table->integer('total')->unsigned();
            $table->text('description')->nullable();
            $table->timestamps();

            //Relations
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('balance_id')->references('id')->on('balances')->onUpdate('cascade');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onUpdate('cascade');
            $table->foreign('expense_type_id')->references('id')->on('expense_types')->onUpdate('cascade');
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
        Schema::dropIfExists('expenses');
    }
}
