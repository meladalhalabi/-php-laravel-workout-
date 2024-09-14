<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExercise extends Model
{
    use HasFactory;

    protected $title = 'user_exercises';
    protected $fillable = [
        'user_id',
        'exercise_id',
        'setting_id'
    ];

    ////////////////Relationships

    //this function can to arrived me to information of users table
    public function user_rel(){ 
        return $this->belongsTo(User::class,'user_id');
    }
     
    //this function can to arrived me to information of exercises table
    public function exer_rel(){
        return $this->belongsTo(Exercises::class,'exercise_id');
    }

    public function user_exer_sett(){
        return $this->belongsTo(Settings::class , 'setting_id');
    }
}
