<?php

namespace Database\Factories;
use App\Models\Question;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence,
            'correct_answer' => $this->faker->word,
            'gold_question' => $this->faker->numberBetween(100, 1000),
            // Adjust as necessary based on your application logic
        ];
    }
}
