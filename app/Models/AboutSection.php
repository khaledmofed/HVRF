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
        'philosophy_title_ja', 'philosophy_title_ko', 'philosophy_title_es', 'philosophy_title_zh_tw', 'philosophy_title_vi',
        'philosophy_body_ja', 'philosophy_body_ko', 'philosophy_body_es', 'philosophy_body_zh_tw', 'philosophy_body_vi',
        'vision_title_ja', 'vision_title_ko', 'vision_title_es', 'vision_title_zh_tw', 'vision_title_vi',
        'vision_body_ja', 'vision_body_ko', 'vision_body_es', 'vision_body_zh_tw', 'vision_body_vi',
        'mission_title_ja', 'mission_title_ko', 'mission_title_es', 'mission_title_zh_tw', 'mission_title_vi',
        'mission_body_ja', 'mission_body_ko', 'mission_body_es', 'mission_body_zh_tw', 'mission_body_vi',
    ];
}
