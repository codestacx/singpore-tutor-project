<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_title','level_id'
    ];

    public function level(){
        //Grade to Level
        return $this->belongsTo('\App\Models\Level','level_id','id');
    }
}
