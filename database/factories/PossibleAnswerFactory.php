<?php

namespace Database\Factories;
use App\Models\PossibleAnswer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PossibleAnswer>
 */
class PossibleAnswerFactory extends Factory
{
    protected $model = PossibleAnswer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'possible_answer' => $this->faker->sentence,
            // Adjust as necessary based on your application logic
        ];
    }
}
