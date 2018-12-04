<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('balance_id')->unsigned()->nullable();
            $table->integer('pet_id')->unsigned()->nullable();
            $table->integer('engagement_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->default(1);
            $table->integer('consecutive')->nullable();
            $table->timestamp('expires')->nullable();
            $table->enum('type', ['quotation', 'purchaseOrder', 'invoice'])->nullable();
            $table->integer('cash')->default(0);
            $table->integer('cheque')->default(0);
            $table->integer('card')->default(0);
            $table->integer('credit')->default(0);
            $table->integer('deposit')->default(0);
            $table->double('subtotal')->default(0);
            $table->double('taxes')->default(0);
            $table->double('total_value')->default(0);
            $table->softDeletes();
            $table->timestamps();

            //Relations
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('balance_id')->references('id')->on('balances')->onUpdate('cascade');
            $table->foreign('pet_id')->references('id')->on('pets')->onUpdate('cascade');
            $table->foreign('engagement_id')->references('id')->on('engagements')->onUpdate('cascade');
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
        Schema::dropIfExists('purchase_orders');
    }
}
