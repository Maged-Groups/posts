<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PostType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'thumbnail' => fake()->imageUrl(),
            'user_id' => User::all()->random()->id,
            'post_type_id' => PostType::all()->random()->id,
        ];
    }
}
