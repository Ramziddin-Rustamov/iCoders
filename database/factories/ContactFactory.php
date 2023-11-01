<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reason'=>$this->faker->sentence(1),
            'message'=>$this->faker->paragraph(3),
            'user_id'=> function(){
                return User::factory()->create()->id;
            },
        ];
    }
}