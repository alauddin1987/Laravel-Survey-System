<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionAnswerOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answer_options', function (Blueprint $table) {

            $table->increments('id');
             $table->integer('created_by')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->string('option');
            $table->timestamps();
        });

         Schema::table('question_answer_options', function($table) {

          $table->foreign('created_by')
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
        Schema::drop('question_answer_options');
    }
}
