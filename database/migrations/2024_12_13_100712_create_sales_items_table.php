<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_Items', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->dateTime('date')->useCurrent();
            $table->decimal('quantity', 8, 2);
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('transaction_type', 10)->nullable();
            $table->string('item_code', 50);
            $table->text('remarks')->nullable()->nullable();
            $table->boolean('is_cash_counted')->nullable();
            $table->decimal('cash_counted', 10, 2)->nullable();
            $table->dateTime('create_date')->nullable();
            $table->unsignedBigInteger('sales_id')->nullable();
            $table->timestamps();
            
            $table->foreign('item_code')->references('code')->on('products')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesItems');
    }
}
