<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadmapYear extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['pillar', 'year_number', 'year_label', 'goal', 'projects_json', 'kpis_json', 'sort_order'];

    protected $casts = [
        'projects_json' => 'array',
        'kpis_json' => 'array',
    ];
}
