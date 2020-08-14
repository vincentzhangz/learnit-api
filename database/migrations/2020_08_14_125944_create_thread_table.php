<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread', function (Blueprint $table) {
            $table->string('thread_id')->primary();
            $table->string('forum_id');
            $table->string('user_id');
            $table->foreign('forum_id')->references('forum_id')->on('forum');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->text('reply_content');
            $table->string('is_correct');
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
        Schema::dropIfExists('thread');
    }
}
