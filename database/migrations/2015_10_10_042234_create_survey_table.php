<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('survey', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('category_id')->unsigned();     
            $table->integer('user_id')->unsigned();     
            $table->string('title');
            $table->text('opening_message')->nullable();
            $table->text('thank_message')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('redirect_url')->nullable();
            $table->enum('survey_restriction', ['Open for all', 'IP Restriction', 'Register User Only']);            
            $table->enum('allowed_survey_no', ['One Time', 'Multiple Time']);
            $table->enum('survey_status', ['Publish', 'Unpublish']);
            $table->timestamps();
        });

         Schema::table('survey', function($table) {
           $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('survey');
    }
}
