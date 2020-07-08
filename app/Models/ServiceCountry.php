<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCountry extends Model
{
    protected $fillable = [
        'service_id', 'country_id',
    ];

    public function country()
    {	
    	return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
