<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = Post::select('id')->get();

        $put = [];
        foreach ($data as $key => $value) {
            $put[] = $value;
        }

            return [
                'comment' => fake()->text(30),
                'post_id' => fake()->randomElement($put),
                'updated_at' => now(),
            ];

    }
}
