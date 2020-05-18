<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedPetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_pet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('feed_id')->unsigned();
            $table->bigInteger('pet_id')->unsigned();
            $table->timestamps();

            $table->foreign('feed_id')->references('id')->on('feeds')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pet_id')->references('id')->on('pets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feed_pet');
    }
}
