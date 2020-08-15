<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum', function (Blueprint $table) {
            $table->string('forum_id')->primary();
            $table->string('course_id');
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('course_id')->references('course_id')->on('course');
            $table->string('forum_title');
            $table->text('forum_content');
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
        Schema::dropIfExists('forum');
    }
}
