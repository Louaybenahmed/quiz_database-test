<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partie;

class PartieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Partie::factory()->count(10)->create();
    }
}
