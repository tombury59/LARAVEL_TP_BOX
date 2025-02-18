<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoxesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'proprietaire_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'price' => $this->faker->numberBetween(100, 1000),
            'status' => 1,
            'taille' => $this->faker->numberBetween(1, 100),
        ];
    }
}
