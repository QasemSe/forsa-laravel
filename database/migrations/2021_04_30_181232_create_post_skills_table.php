<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->nullable();
            $table->integer('skill_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_skills');
    }
}
