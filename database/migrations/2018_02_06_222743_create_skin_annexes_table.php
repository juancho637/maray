<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkinAnnexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skin_annexes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('history_id')->unsigned();
            $table->mediumText('ears')->nullable();
            $table->mediumText('skin')->nullable();
            $table->mediumText('nail')->nullable();
            $table->mediumText('hair')->nullable();
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
        Schema::dropIfExists('skin_annexes');
    }
}
