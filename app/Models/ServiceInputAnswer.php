<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceInputAnswer extends Model
{
    protected $table = 'service_input_answer';

    public function service()
    {	
    	return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function user()
    {	
    	return $this->belongsTo('App\Models\User', 'client_id');
    }
}
