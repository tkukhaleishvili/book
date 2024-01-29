<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::Factory(),
            'name'=> $this->faker->sentence,
            'user_id'=> $this->faker->sentence,
            'description'=> $this->faker->paragraph,
            //
        ];
    }
}
