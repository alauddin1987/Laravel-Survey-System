<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answer_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
