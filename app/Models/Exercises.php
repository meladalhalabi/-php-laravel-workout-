<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'exercise_area',
        'type'
    ];

    /////// Relationships
    public function ExerUser(){
        return $this->belongsToMany(UserExercise::class , 'exercise_id');
    }

    public function exer_allexer(){
        return $this->hasMany(All_Exercises::class , 'exercise_id');
    }


}
