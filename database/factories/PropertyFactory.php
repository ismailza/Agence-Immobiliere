<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = $this->faker->numberBetween(1, 10);
        return [
            'title' => $this->faker->sentence(4, true),
            'description' => $this->faker->sentences(5, true),
            'surface' => $this->faker->numberBetween(20, 360),
            'rooms' => $rooms,
            'bedrooms' => $this->faker->numberBetween(1, $rooms),
            'floor' => $this->faker->numberBetween(0, 5),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'price' => $this->faker->numberBetween(100000, 4000000),
            'sold' => false,
        ];
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
