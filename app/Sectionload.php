<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sectionload extends Model
{
	public function student()
	{
		return $this->belongsTo('App\Student');
	}

	public function semester()
	{
		return $this->belongsTo('App\Semester');
	}

	public function section()
	{
		return $this->belongsTo('App\Section');
	}
}