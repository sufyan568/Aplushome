<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
		protected $table = 'caregivers';

        protected $fillable = [
'client_id', 'intakeco_id', 'name','last_name','middle_name','no_middle_name','email','phone', 'caregiver_payroll', 'image','classification','address','address_line2','location','longitude','latitude','status','gender'
];
}
