<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadmapYear extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'pillar', 'year_number', 'year_label', 'goal', 'projects_json', 'kpis_json', 'sort_order',
        'year_label_ja', 'year_label_ko', 'year_label_es', 'year_label_zh_tw', 'year_label_vi',
        'goal_ja', 'goal_ko', 'goal_es', 'goal_zh_tw', 'goal_vi',
        'projects_json_ja', 'projects_json_ko', 'projects_json_es', 'projects_json_zh_tw', 'projects_json_vi',
        'kpis_json_ja', 'kpis_json_ko', 'kpis_json_es', 'kpis_json_zh_tw', 'kpis_json_vi',
    ];

    protected $casts = [
        'projects_json'       => 'array',
        'projects_json_ja'    => 'array',
        'projects_json_ko'    => 'array',
        'projects_json_es'    => 'array',
        'projects_json_zh_tw' => 'array',
        'projects_json_vi'    => 'array',
        'kpis_json'           => 'array',
        'kpis_json_ja'        => 'array',
        'kpis_json_ko'        => 'array',
        'kpis_json_es'        => 'array',
        'kpis_json_zh_tw'     => 'array',
        'kpis_json_vi'        => 'array',
    ];
}
