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
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
