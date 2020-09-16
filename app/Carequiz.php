<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carequiz extends Model
{

	protected $table = 'carequizzes';
	
    protected $fillable = [
'quizname', 'question', 'answer_a','answer_b','answer_c','answer_d','correct_answer','quiz_id',
];

}
