<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_group_id')->unsigned()->comment('問題集ID');
            $table->integer('user_id')->unsigned()->comment('ユーザーID');
            $table->integer('score')->unsigned()->comment('得点');
            $table->timestamps();

            $table->foreign('question_group_id')
                ->references('id')->on('question_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('challenge_results');
    }
}
