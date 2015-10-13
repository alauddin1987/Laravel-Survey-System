<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->string('user_answer');
            $table->timestamps();

        });

        Schema::table('question_answers', function($table) {

          $table->foreign('user_id')
          ->references('id')->on('users')
          ->onDelete('cascade');

          $table->foreign('question_id')
          ->references('id')->on('survey_questions')
          ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question_answers');
    }
}
