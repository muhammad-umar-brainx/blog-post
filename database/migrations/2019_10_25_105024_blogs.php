<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('creator');
            $table->timestamps();
//            $table->integer('post_id')->unsigned();

//            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

//        Schema::table('blogs', function (Blueprint $table){
//            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
