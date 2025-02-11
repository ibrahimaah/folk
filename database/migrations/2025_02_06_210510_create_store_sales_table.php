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
        Schema::create('store_sales', function (Blueprint $table) { 
                $table->id();
                $table->string('seller_name')->nullable();
                $table->string('seller_phone')->nullable();
                $table->string('title');
                $table->string('store_activity');
                $table->string('store_url');
                $table->integer('store_age');
                $table->decimal('monthly_revenue', 15, 2);
                $table->decimal('price', 15, 2);
                $table->boolean('is_currently_operating');
                $table->text('reason_for_sale');
                $table->text('notes')->nullable();
                // $table->string('category');
                // $table->string('platform');
                $table->text('short_description')->nullable();
                $table->string('store_platform');
                $table->string('store_category');
                $table->string('store_language');
                $table->string('target_market');
                $table->boolean('inventory_included');
                $table->string('slug')->unique();
                $table->boolean('is_approved')->default(false);
                $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_sales');
    }
};
