<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->string('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('monthly_revenue');
            $table->integer('monthly_profit');
            $table->string('category')->nullable();
            $table->string('platform')->nullable();
            $table->json('images')->nullable();  // Nullable as it might not always be provided
            $table->foreignId('user_id')->nullable();  // Nullable if store is not tied to a user
            $table->text('store_activity')->nullable();  // Nullable if not always available
            $table->text('short_description')->nullable();  // Nullable as it may not always be provided
            $table->string('store_platform')->nullable();  // Nullable if not always available
            $table->string('store_category')->nullable();  // Nullable if not always available
            $table->string('store_language')->nullable();  // Nullable if not always available
            $table->string('target_market')->nullable();  // Nullable if not always available
            $table->boolean('inventory_included')->default(false);  // Non-nullable, defaults to false
            $table->text('reason_for_sale')->nullable();  // Nullable if not always available
            $table->integer('opportunity_number')->nullable();  // Nullable as it's not always available
            $table->integer('last_year_sales')->nullable();  // Nullable as it's not always available
            $table->integer('profit_margin')->nullable();  // Nullable as it's not always available
            $table->integer('monthly_orders')->nullable();  // Nullable if not always available
            $table->integer('monthly_marketing_cost')->nullable();  // Nullable if not always available
            $table->integer('monthly_operating_cost')->nullable();  // Nullable if not always available
            $table->integer('required_capital')->nullable();  // Nullable if not always available
            $table->string('capital_recovery_period')->nullable();  // Nullable if not always available
            $table->string('product_source')->nullable();  // Nullable if not always available
            $table->string('store_documentation')->nullable();  // Nullable if not always available
            $table->integer('inventory_value')->nullable();  // Nullable if not always available
            $table->json('growth_opportunities')->nullable();  // Nullable as it might not always be available
            $table->json('competitors')->nullable();  // Nullable as it might not always be available
            $table->string('experience_required')->nullable();  // Nullable if not always available
            $table->string('time_commitment')->nullable();  // Nullable if not always available
            $table->integer('people_required')->nullable();  // Nullable if not always available
            $table->json('daily_tasks')->nullable();  // Nullable if not always available
            $table->json('marketing_activities')->nullable();  // Nullable if not always available
            $table->integer('monthly_growth_rate')->nullable();  // Nullable if not always available
            $table->integer('active_customers')->nullable();  // Nullable if not always available
            $table->integer('social_media_followers')->nullable();  // Nullable if not always available
            $table->integer('knowledge_transfer_sessions')->nullable();  // Nullable if not always available
            $table->text('technical_support')->nullable();  // Nullable if not always available
            $table->json('training_courses')->nullable();  // Nullable as it might not always be available
            $table->json('included_assets')->nullable();  // Nullable as it might not always be available
            $table->boolean('negotiable_price')->default(false);  // Non-nullable, defaults to false
            $table->string('slug')->unique();
            $table->boolean('is_approved')->default(true);  // Non-nullable, defaults to false
            $table->string('seller_name')->nullable();  // Nullable if not always available
            $table->string('seller_phone')->nullable();  // Nullable if not always available
            $table->string('store_url')->nullable();  // Nullable if not always available
            $table->string('store_age')->nullable();  // Nullable if not always available
            $table->boolean('is_currently_operating')->nullable();  // Nullable as it may not always be provided
            $table->text('notes')->nullable();  // Nullable if not always available
            $table->string('url')->nullable();  // Nullable if not always available
            $table->boolean('is_reserved')->default(false);  // Non-nullable, defaults to false
            $table->boolean('is_sold')->default(false);  // Non-nullable, defaults to false
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
