<?php

namespace Database\Factories;

use App\Models\Diary;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'title' => $this->faker->realText(10),
            'body' => $this->faker->realText(50),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}