<?php

namespace Database\Seeders;

use App\Models\All_Exercises;
use App\Models\Exercises;
use App\Models\Reports;
use App\Models\Settings;
use App\Models\User;
use App\Models\UserExercise;
use App\Models\UserModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // this is solve the problem that I can't to use the truncate because the foregin key
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
        
        //User::truncate();
        //User::factory()->count(15)->create();
        //Settings::truncate(); 
        //Settings::factory()->count(15)->create();
        //Reports::truncate();
        //Reports::factory()->count(15)->create();
        //UserExercise::truncate();
        //UserExercise::factory()->count(15)->create();
        // All_Exercises::factory()->count(20)->create();
    }
}
