<?php

namespace Database\Factories;

use App\Models\MainGoals;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'gender' => $this->faker->randomElement(['F', 'M']),
            'language' => $this->faker->randomElement(['E', 'A']),
            'weight' => $this->faker->numberBetween(60, 100),
            'height' => $this->faker->numberBetween(140, 190),
            'pocket_value' => fake()->unique()->numberBetween(1000, 2000),
            'pocket_number' => $this->faker->numberBetween(1000, 2000),
            'maingoal_id' => fake()->randomElement(MainGoals::pluck('id')), 
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
