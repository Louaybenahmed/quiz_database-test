<?php

namespace Database\Factories;
use App\Models\Level;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    protected $model = Level::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'levelNumber' => $this->faker->unique()->numberBetween(1, 10),
            'difficulty' => $this->faker->randomElement(['Easy', 'Medium', 'Hard']),
            'description' => $this->faker->sentence,
        ];
    }
}
