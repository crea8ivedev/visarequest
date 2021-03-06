<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceApplication extends Model
{
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function staff()
    {
        return $this->belongsTo('App\Models\User', 'processor_id');
    }

    public function agent()
    {
        return $this->belongsTo('App\Models\User', 'agent_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function serviceInputsAnswer()
    {
        return $this->hasMany('App\Models\ServiceInputAnswer', 'application_id');
    }
    public function serviceApplicationConversion()
    {
        return $this->hasMany('App\Models\ServiceAplicationConversion', 'application_id');
    }
}
