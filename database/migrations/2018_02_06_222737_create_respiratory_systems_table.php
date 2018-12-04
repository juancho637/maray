<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespiratorySystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respiratory_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id')->unsigned();
            $table->mediumText('breathing_type')->nullable();
            $table->mediumText('vesicular_murmur')->nullable();
            $table->mediumText('rales')->nullable();
            $table->mediumText('wheezing')->nullable();
            $table->mediumText('estridores')->nullable();
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
        Schema::dropIfExists('respiratory_systems');
    }
}
