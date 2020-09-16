<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
	protected $table = 'survey';

    protected $fillable = [
'survey_id','survey_name', 'survey_question', 'option_a','option_b','option_c','option_d','correct_option','status',
];

}
