<?php

namespace Database\Seeders;

use App\Models\Boxes;
use App\Models\ContractTemplate;
use App\Models\Contrat;
use App\Models\Locataires;
use App\Models\Reserverboxes;
use App\Models\Typepayement;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Tom',
            'email' => 'tombury59@hotmail.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@test.test',
            'password' => bcrypt('password'),
        ]);

        Typepayement::factory(5)->create();

        User::factory(10)->create()->each(function ($user) {
            Boxes::factory(1)->create(['proprietaire_id' => random_int(1, 2)]);
        });

        Locataires::factory(20)->create();
//        Reserverboxes::factory(10)->create();


        Boxes::factory()->create([
            'proprietaire_id' => 1,
            'name' => "Boxe de stockage simple",
            'description' => "Boxe de stockage simple",
            'address' => "1 rue de la paix",
            'price' => 50,
            'status' => 1,
            'taille' => 10
        ]);

        Boxes::factory()->create([
            'proprietaire_id' => 2,
            'name' => "Boxe de stockage coloré",
            'description' => "Boxe de stockage coloré",
            'address' => "5 rue de la paix",
            'price' => 5000,
            'status' => 1,
            'taille' => 100
        ]);

        $reserverboxes = Reserverboxes::factory(5)->create();

        // Create 5 ContractTemplate instances
        $contractTemplates = ContractTemplate::factory(5)->create();

        // Create 5 Contrat instances and associate each with a Reserverbox and a ContractTemplate
        $reserverboxes->each(function ($reserverbox) use ($contractTemplates) {
            Contrat::factory()->create([
                'reservation_id' => $reserverbox->id,
                'modele' => $contractTemplates->random()->id, // Use a valid foreign key value
                'contenu' => json_encode(['blocks' => []]),
                'prixParMois' => 100,
            ]);
        });

    }
}
