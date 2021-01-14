<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicExperience extends Model
{
    use HasFactory;

    protected $casts = [
        'proficiencies'=>'array'
    ];
}
