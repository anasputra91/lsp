<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembelian>
 */
class PembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // create dummy data pembelian
            'nonota_beli' => fake()->numerify('pb-####'),
            'tgl_beli' => Carbon::now(),
            'total_beli' => fake()->randomFloat(2),
            'id_user' => fake()->numberBetween(1, 11),
            'id_distributor' => fake()->numberBetween(1,6),
        ];
    }
}
