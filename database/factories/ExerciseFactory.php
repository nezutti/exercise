<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Exercise;


class ExerciseFactory extends Factory
{   protected $model=Exercise::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name(),
            "email"=>$this->faker->safeEmail(),
            "profile"=>$this->faker->text(10)

        ];
    }
}
