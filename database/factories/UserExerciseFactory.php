<?php

namespace Database\Factories;

use App\Models\Exercises;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_Exercises>
 */
class UserExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'foucus_area' => $this->faker->randomElement(['All body' , 'Chest' , 'Arms' , 'Belly' , 'Feet' , 'Noon']),
            'Level' => $this->faker->randomElement(['Beginner' , 'Average' , 'Advanced']),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'exercise_id' => $this->faker->randomElement(Exercises::pluck('id')),
            'setting_id' => $this->faker->unique()->randomElement(Settings::pluck('id'))
        ];
    }
}
