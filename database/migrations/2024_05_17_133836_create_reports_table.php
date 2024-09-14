<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->integer('new_weight')->default(70);
            $table->integer('BMI')->default(0);
            $table->integer('KeloKalory')->default(0);
            $table->integer('time')->default(0); //this time is how many minutes that you passed with exercises
            $table->integer('last_day')->default(0);// this number where (Sunday = 1) => (Saturday = 7) where we will show last day you do a exercise in it in this week
            $table->integer('exercises_counter')->default(0);
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
