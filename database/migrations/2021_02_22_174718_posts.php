<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table){
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->integer('views')->default(0);
            $table->integer('votes')->default(0);
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
