<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgansSensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organs_senses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id')->unsigned();
            $table->mediumText('eyelids')->nullable();
            $table->mediumText('conjunctiva')->nullable();
            $table->mediumText('fluorescein_test')->nullable();
            $table->mediumText('test_rose_bengal')->nullable();
            $table->mediumText('description_cornea')->nullable();
            $table->mediumText('test_shimmer')->nullable();
            $table->mediumText('intraocular_pressure')->nullable();
            $table->mediumText('middle_inner_ear')->nullable();
            $table->timestamps();

            //Relations
            $table->foreign('history_id')->references('id')->on('histories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organs_senses');
    }
}
