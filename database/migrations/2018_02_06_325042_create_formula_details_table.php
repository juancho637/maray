<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formula_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formula_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('presentation')->nullable();
            $table->integer('quantity');
            $table->mediumText('recommendation');
            $table->timestamps();

            //Relations
            $table->foreign('formula_id')->references('id')->on('formulas');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formula_details');
    }
}
