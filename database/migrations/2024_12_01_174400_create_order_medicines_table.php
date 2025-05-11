<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_order_medicines_table.php
public function up()
{
    Schema::create('order_medicines', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id'); // Foreign key to orders
        $table->unsignedBigInteger('medicine_id'); // Foreign key to medicines
        $table->integer('quantity'); // Ordered quantity
        $table->timestamps();

        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_medicines');
    }
};
