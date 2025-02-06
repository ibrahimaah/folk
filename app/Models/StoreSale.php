<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_name', 'seller_phone', 'title', 'store_activity', 'store_url', 
        'store_age', 'monthly_revenue', 'price', 'is_currently_operating', 
        'reason_for_sale', 'notes', 'category', 'platform', 'short_description', 
        'store_platform', 'store_category', 'store_language', 'target_market', 
        'inventory_included', 'is_approved',
    ];
}
