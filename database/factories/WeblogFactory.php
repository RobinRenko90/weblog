<?php

namespace Database\Factories;

use App\Models\Weblog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Weblog>
 */
class WeblogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'user_id' => 1,
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
