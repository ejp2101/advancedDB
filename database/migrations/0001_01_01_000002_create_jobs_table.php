<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $collection) {
            $collection->index('queue');
            $collection->longText('payload');
            $collection->integer('attempts');
            $collection->integer('reserved_at')->nullable();
            $collection->integer('available_at');
            $collection->integer('created_at');
        });

        Schema::create('job_batches', function (Blueprint $collection) {
            $collection->string('id')->primary();
            $collection->string('name');
            $collection->integer('total_jobs');
            $collection->integer('pending_jobs');
            $collection->integer('failed_jobs');
            $collection->longText('failed_job_ids');
            $collection->text('options')->nullable(); // 'mediumText' → 'text' in MongoDB
            $collection->integer('cancelled_at')->nullable();
            $collection->integer('created_at');
            $collection->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $collection) {
            $collection->index('uuid', ['unique' => true]);
            $collection->text('connection');
            $collection->text('queue');
            $collection->longText('payload');
            $collection->longText('exception');
            $collection->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
