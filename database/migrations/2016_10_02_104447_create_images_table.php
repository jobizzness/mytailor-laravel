<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('small');
            $table->string('original');
            $table->string('phone');
            $table->string('medium');
            $table->string('large');
            $table->integer('width');
            $table->integer('height');
            $table->integer('shot_id');
            $table->timestamps();

            //Blongs to a shot or a product
            //136x136 Icon
            //236x the height Phone
            //474   Medium
            //603 Large
            //original size
            //width
            //height
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }
}
