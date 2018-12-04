<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            //$table->string('abbreviation');
            $table->integer('state_id')->unsigned()->default(1);
            $table->integer('area_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            //Relations
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
