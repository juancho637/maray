<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('state_id')->unsigned()->default(1);
            $table->integer('system_cash')->default(0);
            $table->integer('system_cheque')->default(0);
            $table->integer('system_card')->default(0);
            $table->integer('system_expenditure')->default(0);
            $table->integer('system_total')->default(0);
            $table->integer('system_invoice_cash')->default(0);
            $table->integer('system_invoice_cheque')->default(0);
            $table->integer('system_invoice_card')->default(0);
            $table->integer('system_invoice_total')->default(0);
            $table->integer('manual_cash')->default(0);
            $table->integer('manual_cheque')->default(0);
            $table->integer('manual_card')->default(0);
            $table->integer('manual_expenditure')->default(0);
            $table->integer('manual_total')->default(0);
            $table->integer('manual_invoice_cash')->default(0);
            $table->integer('manual_invoice_cheque')->default(0);
            $table->integer('manual_invoice_card')->default(0);
            $table->integer('manual_invoice_total')->default(0);
            $table->timestamps();

            //Relations
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('balances');
    }
}
