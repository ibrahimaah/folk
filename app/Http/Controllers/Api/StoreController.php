<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function init_stores()
    {
        set_time_limit(120); // Increase time limit to 120 seconds

        $data = json_decode(file_get_contents(public_path('json/stores.json')), true);

        foreach ($data as $store) {
            DB::table('stores')->insert([
                'id' => $store['id'],
                'title' => $store['title'],
                'description' => $store['description'],
                'price' => $store['price'],
                'monthly_revenue' => $store['monthly_revenue'],
                'monthly_profit' => $store['monthly_profit'],
                'category' => $store['category'],
                'platform' => $store['platform'],
                'images' => json_encode($store['images'], JSON_UNESCAPED_UNICODE),
                'user_id' => $store['user_id'],
                'store_activity' => $store['store_activity'],
                'short_description' => $store['short_description'],
                'store_platform' => $store['store_platform'],
                'store_category' => $store['store_category'],
                'store_language' => $store['store_language'],
                'target_market' => $store['target_market'],
                'inventory_included' => $store['inventory_included'],
                'reason_for_sale' => $store['reason_for_sale'],
                'opportunity_number' => $store['opportunity_number'],
                'last_year_sales' => $store['last_year_sales'],
                'profit_margin' => $store['profit_margin'],
                'monthly_orders' => $store['monthly_orders'],
                'monthly_marketing_cost' => $store['monthly_marketing_cost'],
                'monthly_operating_cost' => $store['monthly_operating_cost'],
                'required_capital' => $store['required_capital'],
                'capital_recovery_period' => $store['capital_recovery_period'],
                'product_source' => $store['product_source'],
                'store_documentation' => $store['store_documentation'],
                'inventory_value' => $store['inventory_value'],
                'growth_opportunities' => json_encode($store['growth_opportunities'], JSON_UNESCAPED_UNICODE),
                'competitors' => json_encode($store['competitors']),
                'experience_required' => $store['experience_required'],
                'time_commitment' => $store['time_commitment'],
                'people_required' => $store['people_required'],
                'daily_tasks' => json_encode($store['daily_tasks'], JSON_UNESCAPED_UNICODE),
                'marketing_activities' => json_encode($store['marketing_activities'], JSON_UNESCAPED_UNICODE),
                'monthly_growth_rate' => $store['monthly_growth_rate'],
                'active_customers' => $store['active_customers'],
                'social_media_followers' => $store['social_media_followers'],
                'knowledge_transfer_sessions' => $store['knowledge_transfer_sessions'],
                'technical_support' => $store['technical_support'],
                'training_courses' => json_encode($store['training_courses'], JSON_UNESCAPED_UNICODE),
                'included_assets' => json_encode($store['included_assets'], JSON_UNESCAPED_UNICODE),
                'negotiable_price' => $store['negotiable_price'],
                'slug' => $store['slug'],
                'is_approved' => $store['is_approved'],
                'seller_name' => $store['seller_name'],
                'seller_phone' => $store['seller_phone'],
                'store_url' => $store['store_url'],
                'store_age' => $store['store_age'],
                'is_currently_operating' => $store['is_currently_operating'],
                'notes' => $store['notes'],
                'url' => $store['url'],
                'is_reserved' => $store['is_reserved'],
                'is_sold' => $store['is_sold'],
                'created_at' => Carbon::parse($store['created_at'])->toDateTimeString(),
                'updated_at' => Carbon::parse($store['updated_at'])->toDateTimeString()
            ]);
        }

        return 'done';
    }

    public function index()
    {
        $stores = Store::all();
        // dd(method_exists($stores[0], 'getIdAttribute'));



        $stores->transform(function ($store) {
            // Only decode if the field is a string
            if (is_string($store->images)) {
                $store->images = json_decode($store->images, true);
            }
            if (is_string($store->daily_tasks)) {
                $store->daily_tasks = json_decode($store->daily_tasks, true);
            }
            if (is_string($store->growth_opportunities)) {
                $store->growth_opportunities = json_decode($store->growth_opportunities, true);
            }

            // Add decoding for other fields here if necessary
            return $store;
        });

        return response()->json($stores, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id)
    {
        $store = Store::where('id',$id)->where('deleted_at',null)->where('is_approved',true)->first();
        if (!$store) {
            return response()->json([], 200, [], JSON_UNESCAPED_UNICODE);
        }
        return response()->json($store, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
