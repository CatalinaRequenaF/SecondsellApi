<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName(),
            'integer' => $this->faker->buildingNumber(),
            'complement' =>  $this->faker->buildingNumber(),
            'city' =>  $this->faker->city(),
            'state' => $this->faker->state(),
            'country' =>$this->faker->country(),
            'postal_code' => $this->faker->postcode(), 
            'is_primary' => $this->faker->boolean(),
        ];
    }
}
