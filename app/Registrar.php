<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\RegistrarResetPasswordNotification;

class Registrar extends Authenticatable
{
    use Notifiable;

    protected $guard = 'registrar';

    protected $fillable = [
        'fname', 'mname', 'lname', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RegistrarResetPasswordNotification($token));
    }

    public function announcements()
    {
        return $this->morphMany('App\Announcement', 'announcementable');
    }
}
