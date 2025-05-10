<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_items', function (Blueprint $collection) {
            $collection->string('item_code'); // Reference to Products.code
            $collection->dateTime('date')->useCurrent();
            $collection->decimal('quantity', 8, 2);
            $collection->decimal('amount', 10, 2)->nullable();
            $collection->string('transaction_type', 10)->nullable();
            $collection->text('remarks')->nullable();
            $collection->boolean('is_cash_counted')->nullable();
            $collection->decimal('cash_counted', 10, 2)->nullable();
            $collection->dateTime('create_date')->nullable();
            $collection->string('sales_id')->nullable();
            $collection->timestamps();

            // Index for faster query lookup
            $collection->index('item_code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_items');
    }
};
