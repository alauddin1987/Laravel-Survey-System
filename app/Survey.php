<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'survey';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'opening_message', 'thank_message', 'start_date', 'end_date', 'redirect_url', 'poll_retriction', 'allowed_survey_no', 'poll_status'];
}
