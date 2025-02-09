<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Store;
use App\Models\StoreSale;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreSaleController extends Controller
{

    private function generate_new_slug($last_slug)
    {
        try 
        {
            preg_match('/\d+/', $last_slug, $matches);

            $newSlugNumber = $matches[0] + 1; // Default to 1 if no store found

            $newSlug = 'store-' . $newSlugNumber;

            return $newSlug;
        }
        catch(Exception $ex)
        {
            throw new Exception($ex);
        }
    }
    public function store(StoreSaleRequest $request): JsonResponse
    { 
        try 
        {
            
            $lastStoreSale = StoreSale::latest('slug')->first();

            if ($lastStoreSale) 
            {
                $newSlug = $this->generate_new_slug($lastStoreSale->slug);
            }
            else 
            {
               // If store_sales table is empty, get the last slug from stores table and increment by 1
               $lastSlug = Store::latest('slug')->first();

               if (!$lastSlug) 
               {
                   $lastSlug = 'store-1';
               }
               else 
               {
                    $newSlug = $this->generate_new_slug($lastSlug->slug); 
               }
            }
 
            $validated = $request->validated();
            $validated['slug'] = $newSlug;

            $storeSale = StoreSale::create($validated);

            if ($storeSale) 
            {
                return response()->json([
                    'code' => 1,
                    'data' => $storeSale
                ], 201);
            }
            else 
            {
                throw new Exception("can not create new row in store_sales table");
            }
        } 
        catch (Exception $ex) 
        {
            return response()->json(['code' => 0, 'msg' =>  $ex->getMessage()]);
        }
    }

    public function approve($id)
    {
        try 
        {
            DB::beginTransaction();
            // Find the store sale by ID
            $storeSale = StoreSale::findOrFail($id);

            if(!$storeSale->is_approved)
            {
                // Update the is_approved flag to true
                $storeSale->update(['is_approved' => true]);

                // Insert the corresponding store sale data into the stores table
                $store = Store::create([ 
                    'title' => $storeSale->title,
                    'description' => $storeSale->store_activity,
                    'price' => $storeSale->price,
                    'monthly_revenue' => $storeSale->monthly_revenue,
                    'monthly_profit' => $storeSale->price - $storeSale->monthly_revenue,  // Assuming profit is price - revenue, adjust as needed
                    'category' => $storeSale->category,
                    'platform' => $storeSale->platform,
                    'images' => json_encode([]), // Add the appropriate images if needed
                    'user_id' => null,  // Adjust as needed, assuming you have a user column in store_sales
                    'store_activity' => $storeSale->store_activity,
                    'short_description' => $storeSale->short_description,
                    'store_platform' => $storeSale->store_platform,
                    'store_category' => $storeSale->store_category,
                    'store_language' => $storeSale->store_language,
                    'target_market' => $storeSale->target_market,
                    'inventory_included' => $storeSale->inventory_included,
                    'reason_for_sale' => $storeSale->reason_for_sale,
                    'opportunity_number' => null,  // Adjust as needed
                    'last_year_sales' => null,  // Adjust as needed
                    'profit_margin' => null,  // Adjust as needed
                    'monthly_orders' => 0,  // Adjust as needed
                    'monthly_marketing_cost' => 0,  // Adjust as needed
                    'monthly_operating_cost' => 0,  // Adjust as needed
                    'required_capital' => 0,  // Adjust as needed
                    'capital_recovery_period' => '',  // Adjust as needed
                    'product_source' => '',  // Adjust as needed
                    'store_documentation' => '',  // Adjust as needed
                    'inventory_value' => 0,  // Adjust as needed
                    'growth_opportunities' => json_encode([]),  // Adjust as needed
                    'competitors' => json_encode([]),  // Adjust as needed
                    'experience_required' => '',  // Adjust as needed
                    'time_commitment' => '',  // Adjust as needed
                    'people_required' => 0,  // Adjust as needed
                    'daily_tasks' => json_encode([]),  // Adjust as needed
                    'marketing_activities' => json_encode([]),  // Adjust as needed
                    'monthly_growth_rate' => 0,  // Adjust as needed
                    'active_customers' => 0,  // Adjust as needed
                    'social_media_followers' => 0,  // Adjust as needed
                    'knowledge_transfer_sessions' => 0,  // Adjust as needed
                    'technical_support' => '',  // Adjust as needed
                    'training_courses' => json_encode([]),  // Adjust as needed
                    'included_assets' => json_encode([]),  // Adjust as needed
                    'negotiable_price' => $storeSale->negotiable_price,
                    'slug' => $storeSale->slug,
                    'is_approved' => true,  // It will be true when inserted
                    'seller_name' => $storeSale->seller_name,
                    'seller_phone' => $storeSale->seller_phone,
                    'store_url' => $storeSale->store_url,
                    'store_age' => $storeSale->store_age,
                    'is_currently_operating' => $storeSale->is_currently_operating,
                    'notes' => $storeSale->notes,
                    'url' => $storeSale->url,
                    'is_reserved' => false,  // Adjust as needed
                    'is_sold' => false,  // Adjust as needed
                ]);

                if ($store) 
                {
                    DB::commit();
                    return response()->json([
                        'code' => 1,
                        'data' => $store
                    ], 201);
                }
                else 
                {
                    throw new Exception("store is not created");
                }
            }
            else 
            {
                DB::commit();
                return response()->json([
                            'code' => 1,
                            'data' => true,
                            'message' => 'Already approved'
                        ], 200);
            }
            
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            return response()->json(['code' => 0, 'msg' =>  $ex->getMessage()]);
        }
    }
}
