<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('body');
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->integer('publishable_id');
            $table->integer('published_by');
            $table->string('publishable_type');
            $table->timestamps();
        });
        //Comment ID
        //UserID * Publishable
        //ShotID *
        //Body
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->drop();
        });
    }
}
