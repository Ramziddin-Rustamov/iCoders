<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => 'app',
            'client'=>$this->faker->name(),
            'link'=> $this->faker->word(),
            'detail_uz'=> $this->faker->paragraph(2),
            'detail_en'=> $this->faker->paragraph(2),
            'image'=> $this->faker->sentence()

        ];
    }
}
