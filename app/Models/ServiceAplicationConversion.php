<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAplicationConversion extends Model
{
    public $timestamps = true;
    protected $table = 'service_application_conversions';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function application()
    {
        return $this->belongsTo('App\Models\ServiceApplication', 'application_id');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\ServiceApplication', 'service_id');
    }
}
