<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(1),
            'description' => $this->faker->text(300),
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'created_at' => now()

        ];
    }
}
