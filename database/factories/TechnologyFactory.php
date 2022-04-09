<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'image'=>$this->faker->name(),
            'body_uz' => $this->faker->paragraph(),
            'body_en' => $this->faker->paragraph()
        ];
    }
}
