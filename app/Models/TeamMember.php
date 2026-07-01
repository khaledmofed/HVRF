<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'role', 'bio', 'photo_url', 'linkedin_url', 'sort_order', 'is_active',
        'role_ja', 'role_ko', 'role_es', 'role_zh_tw', 'role_vi',
        'bio_ja', 'bio_ko', 'bio_es', 'bio_zh_tw', 'bio_vi',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
