<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Store extends Model
{
    use HasFactory;
    protected $keyType = 'string'; // UUIDs are stored as strings
    public $incrementing = false;  // Disable auto-incrementing IDs

    protected $fillable = [
        'title',
        'description',
        'price',
        'monthly_revenue',
        'monthly_profit',
        'category',
        'platform',
        'images',
        'user_id',
        'store_activity',
        'short_description',
        'store_platform',
        'store_category',
        'store_language',
        'target_market',
        'inventory_included',
        'reason_for_sale',
        'opportunity_number',
        'last_year_sales',
        'profit_margin',
        'monthly_orders',
        'monthly_marketing_cost',
        'monthly_operating_cost',
        'required_capital',
        'capital_recovery_period',
        'product_source',
        'store_documentation',
        'inventory_value',
        'growth_opportunities',
        'competitors',
        'experience_required',
        'time_commitment',
        'people_required',
        'daily_tasks',
        'marketing_activities',
        'monthly_growth_rate',
        'active_customers',
        'social_media_followers',
        'knowledge_transfer_sessions',
        'technical_support',
        'training_courses',
        'included_assets',
        'negotiable_price',
        'slug',
        'is_approved',
        'seller_name',
        'seller_phone',
        'store_url',
        'store_age',
        'is_currently_operating',
        'notes',
        'url',
        'is_reserved',
        'is_sold',
    ];


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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($store) {
            if (!$store->id) {
                $store->id = Str::uuid(); // Generate UUID
            }
        });
    }

}
