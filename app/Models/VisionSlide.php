<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionSlide extends Model
{
    protected $fillable = [
        'tag', 'title', 'description',
        'pill_label', 'pill_icon',
        'sort_order', 'is_active',
        'tag_ja', 'tag_ko', 'tag_es', 'tag_zh_tw', 'tag_vi',
        'title_ja', 'title_ko', 'title_es', 'title_zh_tw', 'title_vi',
        'description_ja', 'description_ko', 'description_es', 'description_zh_tw', 'description_vi',
        'pill_label_ja', 'pill_label_ko', 'pill_label_es', 'pill_label_zh_tw', 'pill_label_vi',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
