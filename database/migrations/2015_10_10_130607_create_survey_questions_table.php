<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); 
            $table->integer('survey_id')->unsigned();           
            $table->string('topic');
            $table->integer('answer_type');
            $table->enum('question_status', ['Publish', 'Unpublish']);
            $table->timestamps();
        });

        Schema::table('survey_questions', function($table) {

          $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('survey_id')
              ->references('id')->on('survey')
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
        Schema::drop('survey_questions');
    }
}
