<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;


    public function request(){
        return $this->hasManyThrough(
            TutorRequestStudent::class,
            TutorRequest::class,
            'tutor_request_id', // Foreign key on the environments table...
            'tutor_request_id',
            'request_id',
            'tutor_request_id'
        );
    }

    public function info(){
        return $this->hasOne(TutorRequest::class,'tutor_request_id','request_id');
    }
}
