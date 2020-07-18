<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = [
        'email_type', 'sender_email', 'subject', 'message', 'status',
    ];

    public function parse($data)
    {   
        $parsed = preg_replace_callback('/{{(.*?)}}/', function ($matches) use ($data) {
        
            list($shortCode, $index) = $matches;

            if( isset($data[$index]) ) {
                return $data[$index];
            } else {
                throw new Exception("Shortcode {$shortCode} not found in template id {$this->id}", 1);   
            }

        }, $this->message);

        
        return $parsed;
    }
}
