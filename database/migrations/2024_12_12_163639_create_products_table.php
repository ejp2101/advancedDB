<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Unique identifier for each product
            $table->unsignedInteger('category')->nullable(); // Category ID
            $table->string('sub_category', 255)->nullable(); // Sub-category name or identifier
            $table->string('brand', 255)->nullable(); // Brand of the product
            $table->string('code', 255)->unique()->nullable(); // Unique code for the product
            $table->string('name', 255); // Name of the product
            $table->text('description')->nullable(); // Description of the product
            $table->decimal('min_quantity', 10, 2)->nullable(); // Minimum stock quantity
            $table->integer('total_quantity')->nullable(); // Total quantity in stock
            $table->decimal('price', 10, 2)->nullable(); // Selling price
            $table->decimal('buy_price', 10, 2)->nullable(); // Purchase price
            $table->boolean('is_inventory_item')->default(0)->nullable(); // Flag for inventory item (1 = true, 0 = false)
            $table->boolean('is_sell_item')->default(0)->nullable(); // Flag for sellable item (1 = true, 0 = false)
            $table->boolean('is_active')->default(1)->nullable(); // Flag for active item (1 = true, 0 = false)
            $table->boolean('is_for_in')->default(0)->nullable(); // Flag for inward transactions (1 = true, 0 = false)
            $table->boolean('is_for_out')->default(0)->nullable(); // Flag for outward transactions (1 = true, 0 = false)
            $table->timestamp('create_date')->nullable(); // Date and time the record was created
            $table->timestamp('update_date')->nullable(); // Date and time the record was last updated
            $table->unsignedInteger('unit_of_measure_id')->nullable(); // Foreign key to the unit of measure

            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
