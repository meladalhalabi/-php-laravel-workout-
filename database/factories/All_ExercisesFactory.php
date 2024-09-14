<?php

namespace Database\Factories;

use App\Models\Exercises;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class All_ExercisesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'exercise_name' => $this->faker->unique()->randomElement([
                'Jumping Jacks',
                'Push-ups',
                'Crunches',
                'High Knees',
                'Lunges',
                'Squats',
                'Tuck Jump',
                'Plank',
                'Mountain Climbers',
                'Burpees',
                'Wall Sit',
                'Russian Twist',
                'Bridge',
                'Bird Dog Crunch',
                'Bear Crawl',
                'Donkey Kicks',
                'Bicycle Crunches',
                'Standing Elbow-to-Knee',
                'Glute Bridges',
                'Bodyweight Good Mornings',

            ]),
            'exercise_number' => $this->faker->randomElement([10,15,13]),
            'exercise_id' => $this->faker->randomElement(Exercises::pluck('id'))

        ];
    }
}
