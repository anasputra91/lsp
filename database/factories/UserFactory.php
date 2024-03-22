<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    private array $level = [
        'Apoteker',
        'Gudang',
        'Kasir',
        'Pemilik',
    ];

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => '1q2w3e4r', // password
            'level' => fake()->randomElement($this->level),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function pemilik(): static
    {
        return $this->state(fn (array $attributes) => [
            'level' => 'Pemilik',
            'password' => 'p12345'
        ]);
    }
    public function gudang(): static
    {
        return $this->state(fn (array $attributes) => [
            'level' => 'Gudang',
            'password' => 'g12345',
        ]);
    }
    public function kasir(): static
    {
        return $this->state(fn (array $attributes) => [
            'level' => 'Kasir',
            'password' => 'k12345',
        ]);
    }
    public function apoteker(): static
    {
        return $this->state(fn (array $attributes) => [
            'level' => 'Apoteker',
            'password' => 'a12345'
        ]);
    }
}
