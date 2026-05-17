<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'philosophy_title', 'philosophy_body',
        'vision_title', 'vision_body',
        'mission_title', 'mission_body',
    ];
}
