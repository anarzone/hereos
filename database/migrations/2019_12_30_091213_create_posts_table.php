<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('slug', 100);
            $table->string('cover')->nullable();
            $table->string('thumbnail_image');
            $table->string('carousel_banner_image');
            $table->string('carousel_small_image');
            $table->tinyInteger('status');
            $table->tinyInteger('format');
            $table->boolean('editor')->default(false);
            $table->boolean('banner')->default(false);
            $table->integer('position')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
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
