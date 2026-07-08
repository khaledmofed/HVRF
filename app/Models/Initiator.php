<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Initiator extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'logo_url', 'website_url', 'sort_order', 'is_active',
        'name_ja', 'name_ko', 'name_es', 'name_zh_tw', 'name_vi',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
