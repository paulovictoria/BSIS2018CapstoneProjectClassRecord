<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $fillable = [
		'year', 'class',
	];

	public function department()
	{
		return $this->belongsTo('App\Department');
	}

  public function classloads()
  {
		return $this->hasMany('App\Classload');
  }

  public function students()
  {
  	return $this->hasMany('App\Student');
  }

  public function irregulars()
  {
  	return $this->hasMany('App\Irregular');
  }
}
