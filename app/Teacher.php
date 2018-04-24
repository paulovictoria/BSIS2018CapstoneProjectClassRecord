<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\TeacherResetPasswordNotification;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'teacher_id','name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPasswordNotification($token));
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject','classloads');
    }

    public function classloads()
    {
        return $this->hasMany('App\Classload');
    }
}
