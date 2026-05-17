<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionSlide extends Model
{
    protected $fillable = [
        'tag', 'title', 'description',
        'pill_label', 'pill_icon',
        'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
