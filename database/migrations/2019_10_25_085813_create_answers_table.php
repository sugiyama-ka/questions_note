<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->comment('問題ID');
            $table->string('content')->comment('問題の内容');
            $table->boolean('correct')->comment('正解かどうか');
            $table->integer('sort')->unsigned()->comment('並び順');
            $table->timestamps();

            $table->foreign('question_id')
                ->references('id')->on('questions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
