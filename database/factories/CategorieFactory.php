<?php

namespace Database\Factories;
use App\Models\Categorie;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    protected $model = Categorie::class;
   
    public function definition()
    {
        return [
            'CategorieName' => $this->faker->word,
            'CategorieDescription' => $this->faker->sentence,
        ];
    }
}
