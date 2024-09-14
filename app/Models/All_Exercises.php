<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_Exercises extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_name',
        'exercise_number',
        'exercise_id'
    ];

    //////////// Relationship

    public function allexer_exer(){
        return $this->belongsTo(Exercises::class , 'exercise_id');
    }
}
