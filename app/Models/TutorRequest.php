<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname','lname','phone','email','grade'
    ];

    public function level(){
        $this->belongsTo('App\Models\Grade','grade','grade_id');
    }
}
