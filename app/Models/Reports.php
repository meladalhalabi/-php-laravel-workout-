<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;
    protected $fillable = [
        'new_weight',
        'BMI',
        'KeloKalory',
        'time',
        'last_day',
        'exercises_number',
        'user_id'
    ];

    /////////////// Relationships

    public function ReportUser(){
       return $this->belongsTo(UserModel::class , 'user_id'); 
    }
}
