<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'Rest_Time',
        'CountDown_Time'
    ];
 
    ///////// Relationships 
    
    public function sett_user_exer()
    {
        return $this->hasMany(UserExercise::class, 'setting_id');
    }

}
