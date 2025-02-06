<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $casts = [
        'id' => 'string',
        'images' => 'array',
        'growth_opportunities' => 'array',
        'daily_tasks' => 'array',
        'marketing_activities' => 'array',
        'training_courses' => 'array',
        'included_assets' => 'array',
        'competitors' => 'array',
        'inventory_included' => 'boolean',
        'adminAccount' => 'boolean',
        'brandIdentity' => 'boolean',
        'domain' => 'boolean',
        'adminAccount' => 'boolean',
        'creativeAssets' => 'boolean',
        'supplierDetails' => 'boolean',
        'socialMediaAccounts' => 'boolean',
        'negotiable_price' => 'boolean',
        'is_approved' => 'boolean',
        'is_reserved' => 'boolean',
        'is_sold' => 'boolean',
    ];
}
