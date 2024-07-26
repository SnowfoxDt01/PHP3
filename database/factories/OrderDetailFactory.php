<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderDetailFactory extends Factory
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
            'quantity' => $this->faker->randomNumber,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'order_id' => Order::all()->random()->order_id,
            'product_id' => Product::all()->random()->product_id
        ];
    }
}
