<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FocusArea extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['number', 'title', 'description', 'examples_json', 'icon_name', 'sort_order', 'is_active'];

    protected $casts = [
        'examples_json' => 'array',
        'is_active' => 'boolean',
    ];
}
