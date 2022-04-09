<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Comment::class;


    
    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'user_id'=> User::factory(),
            'body'=> $this->faker->paragraph()
        ];
    }
}
