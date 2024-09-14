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
        Schema::create('users', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('gender')->default('M')->nullable();
            $table->char('language')->default('E')->nullable();
            $table->smallInteger('weight')->default(70)->nullable();
            $table->smallInteger('height')->default(170)->nullable();
            $table->integer('pocket_value')->unique()->default(0)->nullable(); //type
            $table->integer('pocket_number')->nullable(); //
            $table->foreignId('maingoal_id')->references('id')->on('main_goals')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
