<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['pillar', 'title', 'description', 'features_json', 'how_involved_json', 'sort_order', 'is_active'];

    protected $casts = [
        'features_json' => 'array',
        'how_involved_json' => 'array',
        'is_active' => 'boolean',
    ];
}
