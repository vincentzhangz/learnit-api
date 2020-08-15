<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_detail', function (Blueprint $table) {
            $table->string('material_id')->primary();
            $table->string('course_id');
            $table->foreign('course_id')->references('course_id')->on('course');
            $table->string('course_title');
            $table->text('course_content');
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
        Schema::dropIfExists('course_detail');
    }
}
