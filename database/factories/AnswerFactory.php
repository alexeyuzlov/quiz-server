<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Indicate that the answer is correct.
     *
     * @return Factory
     */
    public function setCorrect()
    {
        return $this->state(function (array $attributes) {
            return [
                'correct' => true,
            ];
        });
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->word,
            'correct' => false
        ];
    }
}
