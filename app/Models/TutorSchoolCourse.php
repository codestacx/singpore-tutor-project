<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorSchoolCourse extends Model
{
    use HasFactory;

    protected $casts = [
        'subjects_and_grades'=>'array'
    ];
}
