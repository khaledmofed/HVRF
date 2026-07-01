<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FocusArea extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'number', 'title', 'description', 'examples_json', 'icon_name', 'sort_order', 'is_active',
        'title_ja', 'title_ko', 'title_es', 'title_zh_tw', 'title_vi',
        'description_ja', 'description_ko', 'description_es', 'description_zh_tw', 'description_vi',
        'examples_json_ja', 'examples_json_ko', 'examples_json_es', 'examples_json_zh_tw', 'examples_json_vi',
    ];

    protected $casts = [
        'examples_json'      => 'array',
        'examples_json_ja'   => 'array',
        'examples_json_ko'   => 'array',
        'examples_json_es'   => 'array',
        'examples_json_zh_tw'=> 'array',
        'examples_json_vi'   => 'array',
        'is_active'          => 'boolean',
    ];
}
