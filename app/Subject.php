<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	protected $fillable = [
        'code', 'title', 'unit',
    ];

    public function teachers()
    {
    	return $this->belongsToMany('App\Teacher');
    }

    public function departments()
    {
    	return $this->belongsToMany('App\Department')->withPivot('id');
    }

    public function classloads()
    {
        return $this->hasMany('App\Classload');
    }

    public function irregulars()
    {
        return $this->hasMany('App\Irregular');
    }
}