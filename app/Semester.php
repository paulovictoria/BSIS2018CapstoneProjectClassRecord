<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
	public function classloads()
	{
	    return $this->hasMany('App\Classload');
	}

  public function irregulars()
  {
  	return $this->hasMany('App\Irregular');
  }
}
