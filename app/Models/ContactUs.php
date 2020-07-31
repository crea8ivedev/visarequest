<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'office_name','adddress', 'adddress1', 'email', 'cellphone', 'telephone', 'international_call','hours',
    ];
}
