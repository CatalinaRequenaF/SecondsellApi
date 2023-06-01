<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => fake()->word(),
        'description' => fake()->sentence(),
        'photo' => json_encode([fake()->imageUrl(), fake()->imageUrl(), fake()->imageUrl()]),
        'state' => fake()->randomElement(['new', 'mid', 'good', 'bad']),
        'price' => fake()->randomDigit(),
        'active'=>  fake()->boolean(),
        'seller_id'=>User::find(1),
        'category_id'=>Category::find(1)
        ];
    }
}
