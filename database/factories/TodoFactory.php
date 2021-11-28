<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'category_id' => 2,
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'date_time' => $this->faker->dateTime,
            'status' => rand(0,2)
        ];
    }
}
