<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPenjualan>
 */
class DetailPenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlah = fake()->randomDigit();
        $harga = fake()->randomFloat(1, 20, 30);
        $total = $jumlah * $harga;
        return [
            //
            'id_penjualan' => fake()->numberBetween(1, 3),
            'jumlah_jual' => $jumlah,
            'harga_jual' => $harga,
            'sub_total_jual' => $total,
            'id_obat' => fake()->numberBetween(1, 6),
        ];
    }
}
