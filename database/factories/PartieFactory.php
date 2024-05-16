<?php

namespace Database\Factories;
use App\Models\Partie;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partie>
 */
class PartieFactory extends Factory
{
    protected $model = Partie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'levelReached' => $this->faker->numberBetween(1, 10),
            // Adjust other attributes as necessary
        ];
    }
}
