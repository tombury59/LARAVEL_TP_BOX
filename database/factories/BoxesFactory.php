<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boxes>
 */
class BoxesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'proprietaire_id' => 1,
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'price' => $this->faker->numberBetween(100, 1000),
            'status' => 1,
        ];
    }
}
