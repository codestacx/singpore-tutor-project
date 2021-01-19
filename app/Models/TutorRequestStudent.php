<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorRequestStudent extends Model
{
    use HasFactory;

    protected $casts = [
        'subjects'=>'array'
    ];
}
