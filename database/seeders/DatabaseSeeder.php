<?php

namespace Database\Seeders;

use App\Models\Boxes;
use App\Models\Locataires;
use App\Models\Reserverboxes;
use App\Models\Typepayement;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Tom',
            'email' => 'tombury59@hotmail.com',
        ]);

        Boxes::factory(10)->create();

        Locataires::factory(20)->create();

        Reserverboxes::factory(10)->create();

        Typepayement::factory(5)->create();
    }
}
