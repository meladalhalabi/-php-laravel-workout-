<?php

namespace Database\Seeders;

use App\Models\Foods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder
{

    public function run()
    {
        //Foods::truncate();
      
        // this data of build the body
        Foods::create([
            'id' => 1,
            'food' => 'Chicken',
            'quantity' => '500g',
            'maingoal_id' => 1
        ]);
        Foods::create([
            'id' => 2,
            'food' => 'fish',
            'quantity' => '100g',
            'maingoal_id' => 1

        ]);
        Foods::create([
            'id' => 3,
            'food' => 'rice',
            'quantity' => '200g',
            'maingoal_id' => 1

        ]);
        Foods::create([
            'id' => 4,
            'food' => 'Apples',
            'quantity' => '2 apples',
            'maingoal_id' => 1

        ]);
        Foods::create([
            'id' => 5,
            'food' => 'Eggs',
            'quantity' => '4 eggs',
            'maingoal_id' => 1
        ]);

        // this data of lost the weight
        Foods::create([
            'id' => 6,
            'food' => 'Chicken',
            'quantity' => '500g',
            'maingoal_id' => 2
        ]);
        Foods::create([
            'id' => 7,
            'food' => 'green salad',
            'quantity' => '100g',
            'maingoal_id' => 2

        ]);
        Foods::create([
            'id' => 8,
            'food' => 'rice',
            'quantity' => '200g',
            'maingoal_id' => 2

        ]);
        Foods::create([
            'id' => 9,
            'food' => 'Apples',
            'quantity' => '2 apples',
            'maingoal_id' => 2

        ]);
        Foods::create([
            'id' => 10,
            'food' => 'drink water',
            'quantity' => '2 laters',
            'maingoal_id' => 2
        ]);

        // this data of save on body
        Foods::create([
            'id' => 11,
            'food' => 'Chicken',
            'quantity' => '500g',
            'maingoal_id' => 3
        ]);
        Foods::create([
            'id' => 12,
            'food' => 'green salad',
            'quantity' => '100g',
            'maingoal_id' => 3

        ]);
        Foods::create([
            'id' => 13,
            'food' => 'rice',
            'quantity' => '200g',
            'maingoal_id' => 3

        ]);
        Foods::create([
            'id' => 14,
            'food' => 'Apples',
            'quantity' => '2 apples',
            'maingoal_id' => 3

        ]);
        Foods::create([
            'id' => 15,
            'food' => 'Eggs',
            'quantity' => '4 eggs',
            'maingoal_id' => 3
        ]);
    }
}
