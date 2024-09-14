<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MainGoals extends Model
{
    use HasFactory;
    protected $title = 'main_goals';
    protected $fillable = [
        'goal_name'
    ];

    //////// Relationships
    public function MainGoalsUser(){
        return $this->hasMany(User::class , 'maingoal_id');
    }

    public function MainGoalsFood(){
        return $this->hasMany(Foods::class, 'maingoal_id');
    }
    
}
