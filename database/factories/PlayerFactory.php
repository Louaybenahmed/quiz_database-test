<?php

namespace Database\Factories;
use App\Models\Player;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    protected $model = Player::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'userName' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // or you can use Hash::make('password')
            'score' => $this->faker->numberBetween(0, 1000),
            'gold' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
