<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    protected $fillable = [
        'food',
        'quantity',
        'maingoal_id'
    ];
    
    //////// Relationships
    public function FoodsMainGoals(){
        return $this->belongsTo(MainGoals::class , 'maingoal_id');
    }
}
