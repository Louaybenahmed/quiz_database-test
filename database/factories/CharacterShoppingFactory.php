<?php

namespace Database\Factories;
use App\Models\CharacterShopping;
use App\Models\Player;
use App\Models\Character;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CharacterShopping>
 */
class CharacterShoppingFactory extends Factory
{
    protected $model = CharacterShopping::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'shopping_date' => $this->faker->dateTime,
            'player_id' => Player::factory(),
            'character_id' => Character::factory(),
        ];
    }
}
