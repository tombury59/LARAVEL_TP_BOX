<?php

namespace Database\Seeders;

use App\Models\Boxes;
use App\Models\Locataires;
use App\Models\Reserverboxes;
use App\Models\Typepayement;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Tom',
            'email' => 'tombury59@hotmail.com',
            'password' => bcrypt('password'),
        ]);

        Typepayement::factory(5)->create();

        User::factory(10)->create()->each(function ($user) {
            Boxes::factory(1)->create(['proprietaire_id' => $user->id]);
        });

        Locataires::factory(20)->create();
        Reserverboxes::factory(10)->create();

    }
}
