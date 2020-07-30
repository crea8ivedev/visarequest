<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'slug', 'heading', 'description','meta_description', 'meta_keywords',
    ];
}
