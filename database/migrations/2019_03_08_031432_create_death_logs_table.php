<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeathLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('death_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('character_id')->unsigned();
            $table->tinyInteger('episode')->unsigned();
            $table->boolean('confirmed');

            $table->timestamps();

            $table->foreign('character_id')
                ->references('id')->on('characters')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('death_logs');
    }
}
