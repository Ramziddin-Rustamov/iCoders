<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SlideImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_uz' => $this->faker->sentence(1),
            'title_en' => $this->faker->sentence(1),
            'body_uz' => $this->faker->paragraph(2),
            'body_en' => $this->faker->paragraph(2),
            'image'=> $this->faker->sentence(1)
        ];
    }
}
