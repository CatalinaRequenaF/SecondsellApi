<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'emit' => $this->faker->numberBetween(1, 100),
            'state' => $this->faker->randomElement([0, 1]),
            'message' => $this->faker->sentence,
            'chat_id' => function () {
            return Chat::factory()->create()->id;
            },
            'product_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
