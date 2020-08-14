<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->string('course_id')->primary();
            $table->string('user_id');
            $table->string('category_id');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->string('course_title');
            $table->integer('max_enroll_student');
            $table->integer('max_learning_day');
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
        Schema::dropIfExists('course');
    }
}
