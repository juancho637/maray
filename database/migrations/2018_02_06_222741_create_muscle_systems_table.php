<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuscleSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muscle_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id')->unsigned();
            $table->mediumText('previous_members')->nullable();
            $table->mediumText('subsequent_members')->nullable();
            $table->mediumText('spine')->nullable();
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
        Schema::dropIfExists('muscle_systems');
    }
}
