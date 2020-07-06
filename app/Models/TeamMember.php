<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name', 'position', 'email', 'phone', 'facebook', 'instagram', 'twitter',
    ];
}
