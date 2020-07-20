<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'country_id', 'heading', 'message',
    ];

    public function country()
    {	
    	return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
