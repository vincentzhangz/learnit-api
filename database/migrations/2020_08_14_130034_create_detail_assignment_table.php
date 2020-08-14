<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_assignment', function (Blueprint $table) {
            $table->string('assignment_id');
            $table->string('user_id');
            $table->string('assignment_upload_file');
            $table->integer('assignment_score');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('assignment_id')->references('assignment_id')->on('assignment');
            $table->primary(['user_id','assignment_id']);
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
        Schema::dropIfExists('detail_assignment');
    }
}
