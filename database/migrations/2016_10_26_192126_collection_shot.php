<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CollectionShot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_shot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shot_id');
            $table->integer('collection_id');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('collection_shot', function(Blueprint $table){

            $table->drop();
        });
    }
}
