<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\[Obat]>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $jenis_obat = [
        'Tablet',
        'Pil',
        'Kaplet',
        'Larutan',
    ];

    public function definition(): array
    {
        return [
            // create dummy data with faker php
            'kode_obat' => fake()->numerify('obat-#######'),
            'nama_obat' => fake()->lexify(),
            'merk' => fake()->word(),
            'jenis' => fake()->randomElement($this->jenis_obat),
            'satuan' => fake()->word(),
            'golongan' => fake()->word(),
            'kemasan' => fake()->word(),
            'harga_jual' => fake()->randomFloat(2, 3, 11),
            'stok' => fake()->numberBetween(0, 90),
        ];
    }
}
