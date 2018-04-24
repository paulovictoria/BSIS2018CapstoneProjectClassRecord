<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Midterm extends Model
{
	public function classload()
	{
		return $this->belongsTo('App\Classload');
	}

	public function student()
	{
		return $this->belongsTo('App\Student');
	}
}
