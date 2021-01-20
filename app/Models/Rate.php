<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;



    public function grades(){
        return $this->hasOne(Grade::class,'grade_id','grade');
    }



    public function categories(){
        return $this->hasOne(TutorTypes::class,'id','category');
    }
}
