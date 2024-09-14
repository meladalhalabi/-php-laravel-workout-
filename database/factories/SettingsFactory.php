<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SettingsFactory extends Factory
{
    
    public function definition()
    {
        return [
            'Rest_Time' => $this->faker->randomElement([20,25,30,35,40,45]),
            'CountDown_Time' => $this->faker->randomElement([10,15,20])
        ];
    }
}
