<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPembelian>
 */
class DetailPembelianFactory extends Factory
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
            'id_pembelian' => fake()->numberBetween(1, 3),
            'tgl_kadarluarsa' => Carbon::now()->addMonth(),
            'harga_beli' => $harga,
            'jumlah_beli' => $jumlah,
            'sub_total_beli' => $total,
            'persen_margin_jual' => fake()->randomDigit(),
            'id_obat' => fake()->numberBetween(1, 6),
        ];
    }
}
