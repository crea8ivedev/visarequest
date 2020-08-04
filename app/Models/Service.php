<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'country_id', 'staff_id', 'agent_id','name', 'description', 'normal_price', 'discount_price', 'commission', 'status',
    ];

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

    public function countries()
    {
        return $this->hasMany('App\Models\ServiceCountry');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\ServiceCategory');
    }
}