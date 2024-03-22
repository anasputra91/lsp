<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distributor>
 */
class DistributorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // create dummy data distributor
            'nama_distributor' => fake()->firstName(),
            'alamat' => fake()->address(),
            'notelepon' => fake()->e164PhoneNumber(),
        ];
    }
}
