<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryEngagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_engagements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id')->unsigned()->default(1);
            $table->integer('engagement_id')->unsigned()->default(1);
            $table->timestamps();

            //Relations
            $table->foreign('history_id')->references('id')->on('histories')->onUpdate('cascade');
            $table->foreign('engagement_id')->references('id')->on('engagements')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_engagements');
    }
}
