<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * 
     */
    public function definition()
    {
        return [
            'nisn' => Str::random(5),
            'name' => $this->faker->name(),
            'lp' => $this->faker->title($lp = 'l'|'p'),
            'birthplace' => $this->faker->name(),
            'birthdate' => $this->faker->date(),
            
        ];
    }
}
