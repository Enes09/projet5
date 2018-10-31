<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertedCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerted_comment', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('comment_id');
            $table->timestamps();
            $table->primary(['user_id', 'comment_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alerted_comment');
    }
}
