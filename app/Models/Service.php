<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'country_id', 'staff_id', 'agent_id','name', 'description', 'normal_price', 'discount_price', 'commission', 
    ];

    public function country()
    {	
    	return $this->belongsTo('App\Country', 'country_id');
    }

    public function staff()
    {	
    	return $this->belongsTo('App\User', 'staff_id');
    }

    public function agent()
    {	
    	return $this->belongsTo('App\User', 'agent_id');
    }
}
