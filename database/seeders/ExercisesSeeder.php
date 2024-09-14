<?php

namespace Database\Seeders;

use App\Models\Exercises;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
            Exercises::create([
                'id' => 1,
                'exercise_area' => 'All body',
                'type' => 'free'
            ]);
            Exercises::create([
                'id' => 2,
                'exercise_area' => 'Chest',
                'type' => 'free'
            ]);
            Exercises::create([
                'id' => 3,
                'exercise_area' => 'Arms',
                'type' => 'free'
            ]);
            Exercises::create([
                'id' => 4,
                'exercise_area' => 'Belly',
                'type' => 'free'
            ]);
            Exercises::create([
                'id' => 5,
                'exercise_area' => 'Feet',
                'type' => 'free'
            ]);
            Exercises::create([
                'id' => 6,
                'exercise_area' => 'Noon',
                'type' => 'free'
            ]);
            Exercises::create([
                'id' => 7,
                'exercise_area' => 'Weight loss',
                'type' => 'paid'
            ]);
            Exercises::create([
                'id' => 8,
                'exercise_area' => 'Warm-up',
                'type' => 'paid'
            ]);
    }
}
