<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Post::class;
    
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'title_uz'=> $this->faker->sentence(),
            'title_en'=> $this->faker->sentence(),
            'body_uz' =>$this->faker->paragraph(10),
            'body_en' =>$this->faker->paragraph(10),
            'image'=> $this->faker->sentence()
        ];
    }
}
