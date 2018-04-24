<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classload extends Model
{
    // protected $primaryKey = 'teacher_id';
    
    public function teacher()
    {
    	return $this->belongsTo('App\Teacher');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function department()
    {
    	return $this->belongsTo('App\Department');
    }

    public function section()
    {
    	return $this->belongsTo('App\Section');
    }

    public function semester()
    {
    	return $this->belongsTo('App\Semester');
    }

    public function matrix()
    {
        return $this->hasOne('App\Matrix');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function limits()
    {
        return $this->hasMany('App\Limit');
    }

    public function finalgrades()
    {
        return $this->hasMany('App\Finalgrade');
    }

    public function finalterms()
    {
        return $this->hasMany('App\Finalterm');
    }

    public function midterms()
    {
        return $this->hasMany('App\Midterm');
    }
}
