<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AgentResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticate;

class Agent extends Authenticatable
{
    use Notifiable;

    protected $guard = 'agent';

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'last_login_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AgentResetPasswordNotification($token));
    }
}
