<?php

namespace Database\Factories;

use App\Models\Contrat;
use App\Models\ContractTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratFactory extends Factory
{
    protected $model = Contrat::class;

    public function definition()
    {
        return [
            'reservation_id' => \App\Models\Reserverboxes::factory(),
            'modele' => ContractTemplate::factory(), // Foreign key to contract_templates
            'contenu' => json_encode(['blocks' => []]),
            'prixParMois' => $this->faker->numberBetween(50, 500),
        ];
    }
}
