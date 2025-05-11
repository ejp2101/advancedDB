<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'address' => implode(' ', fake()->words(5)),
            'email' => fake()->unique()->email(),
            'phonenumber' => fake()->unique()->e164PhoneNumber(),
            'paymentterms' => fake()->word(),

        ];
    }
}
