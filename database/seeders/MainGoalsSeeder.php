<?php

namespace Database\Seeders;

use App\Models\MainGoals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainGoalsSeeder extends Seeder
{
 
    public function run()
    {
        //MainGoals::truncate();
        MainGoals::create([
            'id' => 1,
            'goal_name' => 'build the body'
        ]);
        MainGoals::create([
            'id' => 2,
            'goal_name' => 'weight loss'
        ]);
        MainGoals::create([
            'id' => 3,
            'goal_name' => 'save on the body'
        ]);
    }
}
