<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'ip', 'country_code', 'country_name', 'region_code', 'region_code', 'city', 'zip_code', 'time_zone', 'latitude', 'longitude',
    ];
}
