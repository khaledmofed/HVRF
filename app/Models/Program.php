<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'pillar', 'title', 'description', 'features_json', 'how_involved_json', 'sort_order', 'is_active',
        'title_ja', 'title_ko', 'title_es', 'title_zh_tw', 'title_vi',
        'description_ja', 'description_ko', 'description_es', 'description_zh_tw', 'description_vi',
        'features_json_ja', 'features_json_ko', 'features_json_es', 'features_json_zh_tw', 'features_json_vi',
        'how_involved_json_ja', 'how_involved_json_ko', 'how_involved_json_es', 'how_involved_json_zh_tw', 'how_involved_json_vi',
    ];

    protected $casts = [
        'features_json'          => 'array',
        'features_json_ja'       => 'array',
        'features_json_ko'       => 'array',
        'features_json_es'       => 'array',
        'features_json_zh_tw'    => 'array',
        'features_json_vi'       => 'array',
        'how_involved_json'      => 'array',
        'how_involved_json_ja'   => 'array',
        'how_involved_json_ko'   => 'array',
        'how_involved_json_es'   => 'array',
        'how_involved_json_zh_tw'=> 'array',
        'how_involved_json_vi'   => 'array',
        'is_active'              => 'boolean',
    ];
}
