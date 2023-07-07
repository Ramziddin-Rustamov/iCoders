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
            'image'=> $this->faker->randomElement([
                '["image\/portfolio-1.jpg.jpg"]',
                '["image\/portfolio-2.jpg.jpg"]',
                '["image\/portfolio-3.jpg.jpg"]',
                '["image\/portfolio-4.jpg.jpg"]',
                '["image\/portfolio-5.jpg.jpg"]',
                '["image\/portfolio-6.jpg.jpg"]',
                '["image\/portfolio-7.jpg.jpg"]',
                '["image\/portfolio-8.jpg.jpg"]',
            ]),
        ];
    }
}
