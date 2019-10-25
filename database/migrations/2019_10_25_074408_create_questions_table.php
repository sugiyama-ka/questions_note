<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_group_id')->unsigned()->comment('問題集ID');
            $table->string('content')->comment('問題の内容');
            $table->integer('weight')->unsigned()->comment('配点');
            $table->integer('sort')->unsigned()->comment('並び順');
            $table->timestamps();

            $table->foreign('question_group_id')
                ->references('id')->on('question_groups')
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
        Schema::dropIfExists('questions');
    }
}
