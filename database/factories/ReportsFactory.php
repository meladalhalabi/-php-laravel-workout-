<?php

namespace Database\Factories;

use App\Models\Reports;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports>
 */
class ReportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'BMI' => $this->faker->numberBetween(100,200),
            'KeloKalory' => $this->faker->numberBetween(1000,2000),
            'time' => $this->faker->numberBetween(100,200),
            'last_day' => $this->faker->numberBetween(1,7),
            'exercises_Counter' => $this->faker->numberBetween(5,30),
            'user_id' => $this->faker->unique()->randomElement(User::pluck('id')),
            'new_weight' => $this->faker->randomElement(User::pluck('weight')),
        ];
    }
}
