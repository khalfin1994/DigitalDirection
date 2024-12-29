<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'audio_file' => $this->faker->file('public/storage', 'storage/app/public', false),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'user_id' => User::factory(),
        ];
    }
}
