<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Medicine($faker));

        return [
            'medicine_name' => $faker->medicine,
            'supplier_id' => Supplier::factory(),
            'quantity' => random_int(10,200),
            'otc' => $faker->randomElement(['OTC','Prescription']),
            'unit_price' =>  fake()->randomFloat(2, 5, 1000),
        ];
    }
}
