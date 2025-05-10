<?php

namespace Database\Seeders;

use App\Models\User; // Assuming you have a MongoUser model
use Illuminate\Database\Seeder;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // MongoUser::factory(10)->create();

        MongoUser::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}