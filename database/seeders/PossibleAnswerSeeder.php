<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PossibleAnswer;

class PossibleAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        PossibleAnswer::factory()->count(10)->create();
    }
}
