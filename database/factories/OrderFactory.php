<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'totalPrice' => $this->faker->randomFloat(2, 10, 100),
            'user_id' => User::factory(),
        ];
    }
}
