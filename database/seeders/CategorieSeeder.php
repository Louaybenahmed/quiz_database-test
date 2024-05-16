<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**step1:Create Individual Seeders---------------------in the terminat--------------------
        php artisan make:seeder UserSeeder

        step2: Define the Seed Data in the "run" Method:------in this file under : public function run(): void{----------
          for example Create 200 Categorie
        Categorie::factory()->count(200)->create();

        step3:Call Seeders from DatabaseSeeder.php------------in DatabaseSeeder.php file-----------
         Call individual seeders
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
             Add other seeders here
        ]);
        

        step4:Run the Seeders---------------------in the terminat--------------------
        php artisan db:seed*/
    
    public function run(): void
    {
        Categorie::factory()->count(10)->create();
    }
}
