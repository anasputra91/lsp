<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penjualan>
 */
class PenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // create dummy data penjualan
            'nonota_jual' => fake()->numerify("pj-####"),
            'tgl_jual' => Carbon::now(),
            'total_jual' => fake()->randomFloat(2, 8, 30),
            'id_user' => fake()->numberBetween(1, 11),
        ];
    }
}
