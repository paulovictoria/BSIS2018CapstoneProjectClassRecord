<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\StudentResetPasswordNotification;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'student_id', 'fname', 'mname', 'lname', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function sectionloads()
    {
        return $this->hasMany('App\Sectionload');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
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

    public function irregulars()
    {
        return $this->hasMany('App\Irregular');
    }
}
