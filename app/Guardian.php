<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\GuardianResetPasswordNotification;

class Guardian extends Authenticatable
{
    use Notifiable;

    protected $guard = 'guardian';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new GuardianResetPasswordNotification($token));
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
