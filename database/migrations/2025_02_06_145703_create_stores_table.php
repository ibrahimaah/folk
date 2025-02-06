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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('monthly_revenue');
            $table->integer('monthly_profit');
            $table->string('category')->nullable();
            $table->string('platform')->nullable();
            $table->json('images');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('store_activity')->nullable();
            $table->text('short_description')->nullable();
            $table->string('store_platform')->nullable();
            $table->string('store_category')->nullable();
            $table->string('store_language')->nullable();
            $table->string('target_market')->nullable();
            $table->boolean('inventory_included')->default(false);
            $table->text('reason_for_sale')->nullable();
            $table->integer('opportunity_number')->nullable();
            $table->integer('last_year_sales')->nullable();
            $table->integer('profit_margin')->nullable();
            $table->integer('monthly_orders');
            $table->integer('monthly_marketing_cost');
            $table->integer('monthly_operating_cost');
            $table->integer('required_capital');
            $table->string('capital_recovery_period');
            $table->string('product_source')->nullable();
            $table->string('store_documentation');
            $table->integer('inventory_value')->nullable();
            $table->json('growth_opportunities')->nullable();
            $table->json('competitors')->nullable();
            $table->string('experience_required');
            $table->string('time_commitment');
            $table->integer('people_required');
            $table->json('daily_tasks');
            $table->json('marketing_activities');
            $table->integer('monthly_growth_rate');
            $table->integer('active_customers');
            $table->integer('social_media_followers');
            $table->integer('knowledge_transfer_sessions');
            $table->text('technical_support')->nullable();
            $table->json('training_courses')->nullable();
            $table->json('included_assets');
            $table->boolean('negotiable_price')->default(false);
            $table->string('slug')->unique();
            $table->boolean('is_approved')->default(false);
            $table->string('seller_name')->nullable();
            $table->string('seller_phone')->nullable();
            $table->string('store_url')->nullable();
            $table->string('store_age')->nullable();
            $table->boolean('is_currently_operating')->nullable();
            $table->text('notes')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_reserved')->default(false);
            $table->boolean('is_sold')->default(false);
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
