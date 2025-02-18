<?php

namespace Database\Factories;

use App\Models\ContractTemplate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractTemplateFactory extends Factory
{
    protected $model = ContractTemplate::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Provide a valid user_id
            'name' => $this->faker->word,
            'content' => json_encode(['blocks' => []]),
        ];
    }
}
