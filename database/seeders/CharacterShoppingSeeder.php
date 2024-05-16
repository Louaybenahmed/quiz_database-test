<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CharacterShopping;

class CharacterShoppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CharacterShopping::factory()->count(10)->create();
    }
}
