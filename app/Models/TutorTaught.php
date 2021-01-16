<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorTaught extends Model
{
    use HasFactory;

    protected $fillable = [
        'preference_id',
        'level','grade','subject'
    ];
}
