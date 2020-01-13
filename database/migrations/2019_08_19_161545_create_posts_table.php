<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_title');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('post_content');
            $table->string('post_price');
            $table->string('post_type');
            $table->string('post_location');
            $table->string('post_year');
            $table->string('post_furnished');
            $table->string('post_floor');
            $table->string('post_therm');
            $table->string('post_features');
            $table->string('building_type');
            $table->string('post_promote');
            $table->string('images');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
