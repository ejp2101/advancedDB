<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $collection) {
            $collection->index('code', ['unique' => true]); // Unique product code
            $collection->string('category')->nullable();
            $collection->string('sub_category')->nullable();
            $collection->string('brand')->nullable();
            $collection->string('name');
            $collection->text('description')->nullable();
            $collection->decimal('min_quantity', 10, 2)->nullable();
            $collection->integer('total_quantity')->nullable();
            $collection->decimal('price', 10, 2)->nullable();
            $collection->decimal('buy_price', 10, 2)->nullable();
            $collection->boolean('is_inventory_item')->default(false);
            $collection->boolean('is_sell_item')->default(false);
            $collection->boolean('is_active')->default(true);
            $collection->boolean('is_for_in')->default(false);
            $collection->boolean('is_for_out')->default(false);
            $collection->timestamp('create_date')->nullable();
            $collection->timestamp('update_date')->nullable();
            $collection->string('unit_of_measure_id')->nullable(); // Reference ID
            $collection->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
