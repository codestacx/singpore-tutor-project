<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;


    protected $fillable = [
      'level_title'
    ];


    public function grades(){
        //Level to Grade
        return $this->hasMany('\App\Models\Grade','level_id','id');
    }
}
