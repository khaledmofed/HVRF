<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'quote_text', 'headline', 'subheadline',
        'cta_primary_label', 'cta_primary_url',
        'cta_secondary_label', 'cta_secondary_url', 'is_active',
        'quote_text_ja', 'quote_text_ko', 'quote_text_es', 'quote_text_zh_tw', 'quote_text_vi',
        'headline_ja', 'headline_ko', 'headline_es', 'headline_zh_tw', 'headline_vi',
        'subheadline_ja', 'subheadline_ko', 'subheadline_es', 'subheadline_zh_tw', 'subheadline_vi',
        'cta_primary_label_ja', 'cta_primary_label_ko', 'cta_primary_label_es', 'cta_primary_label_zh_tw', 'cta_primary_label_vi',
        'cta_secondary_label_ja', 'cta_secondary_label_ko', 'cta_secondary_label_es', 'cta_secondary_label_zh_tw', 'cta_secondary_label_vi',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
