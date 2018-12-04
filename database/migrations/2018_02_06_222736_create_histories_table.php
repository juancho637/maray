<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('engagement_id')->unsigned();
            $table->string('diet')->nullable();
            $table->mediumText('motive')->nullable();
            $table->mediumText('current_illness')->nullable();
            $table->mediumText('background_pet')->nullable();
            $table->mediumText('another')->nullable();
            $table->mediumText('general_impression')->nullable();
            $table->integer('fc')->unsigned()->nullable();
            $table->string('pa')->nullable();
            $table->integer('fr')->unsigned()->nullable();
            $table->integer('heartbeat')->unsigned()->nullable();
            $table->float('temperature', 5, 2)->unsigned()->nullable();
            $table->float('weight', 5, 2)->unsigned()->nullable();
            $table->float('square_meter', 5, 2)->unsigned()->nullable();
            $table->mediumText('final_diagnosis')->nullable();
            $table->json('additional_data')->nullable();
            $table->softDeletes();
            $table->timestamps();

            //Relations
            $table->foreign('engagement_id')->references('id')->on('engagements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
