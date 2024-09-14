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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable'); //this consists from to column the first is tokenable_id and the second is tokenable_type
            // tokenable_id this is store the id of user 
            // tokenable_type this is the track of the model of the user 
            $table->string('name'); // this name of the token and you can to name it any thing you want it 
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable(); // this is auth of token such ['*'] which the access of token of any place or any action
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('personal_access_tokens');
    }
};
