<?php

namespace Database\Factories;
use App\Models\Character;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    protected $model = Character::class;
    public function definition()
    {
        return [
            'character_name' => $this->faker->name,
            'character_photo' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
