<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $casts = [
        'images' => 'array',
        'growth_opportunities' => 'array',
        'daily_tasks' => 'array',
        'marketing_activities' => 'array',
        'training_courses' => 'array',
        'included_assets' => 'array',
        'competitors' => 'array',
    ];
}
