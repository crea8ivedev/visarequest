<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaPage extends Model
{
    protected $fillable = [
        'page', 'slug', 'title', 'description', 'keywords',
    ];
}
