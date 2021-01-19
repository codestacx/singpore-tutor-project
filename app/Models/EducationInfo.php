<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationInfo extends Model
{
    use HasFactory;


    protected $fillable = [
        'category','user_id','is_nie_trained','highest_qualification',
        'sub_category','moe_email'
    ];


}
