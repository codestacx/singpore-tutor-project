<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function isEmailAlreadyRegistered($email){
        $count = User::where(['email'=>$email])->count();
        return $count == 0 ? false:true;
    }

    public function basicinfo(){
        return $this->hasOne(BasicInfo::class,'user_id','id');
    }

    public function education_info(){
        return $this->hasOne(EducationInfo::class,'user_id','id');
    }

    public function education_info_courses(){
        return $this->hasManyThrough(
            TutorSchoolCourse::class,
            EducationInfo::class,
            'user_id',  //foreign key on education info table
            'education_id',
            'id',
            'education_id'
        );
    }



    public function academic_info(){
        return $this->hasOne(AcademicExperience::class,'user_id','id');
    }

    public function music_info(){
        return $this->hasOne(MusicExperience::class,'user_id','id');
    }


    public function preference_info(){
        return $this->hasOne(Preference::class,'user_id','id');
    }

    public function students_records(){
        return $this->hasManyThrough(
            TutorTaught::class,
            Preference::class,
            'user_id',
            'preference_id',
            'id',
            'tutor_preference_id'
        );
    }


    public function documents_info(){
        return $this->hasOne(Document::class,'user_id','id');
    }




}
