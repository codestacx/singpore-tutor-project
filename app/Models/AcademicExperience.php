<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicExperience extends Model
{
    use HasFactory;
    protected $casts = [
        'moe_experiences'=>'array',
        'private_experiences'=>'array',
        'students_taught'=>'array'
    ];
}
