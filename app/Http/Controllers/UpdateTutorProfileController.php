<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use App\Models\Instrument;
use App\Models\Level;
use App\Models\MoeTutorSpecification;
use App\Models\Qualification;
use App\Models\Race;
use App\Models\SchoolType;
use App\Models\StudentCategory;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

class UpdateTutorProfileController extends Controller{

    public function updateBasicInformation(Request $request){

        if($request->method() == 'POST'){
            //update the basic information

            $user = User::find(session('tutor_id'));
            $user->name = $request->fullname;
            $user->save();

            session()->put('tutor_name',$user->name);
            $now = Carbon::now();
            $formData = [
                'user_id'=>$user->id,
                'gender'=>$request->gender,
                'mobile'=>$request->mobile,
                'year'=>$request->birth_year,
                'postal_code'=>$request->postal_code,
                'race'=>$request->race,
                'country'=>$request->country,
                'citizenship'=>$request->citizenship,
                'created_at'=>$now,
                'updated_at'=>$now
            ];


            $table = DB::table('basic_infos');
            $whereClause = ['user_id'=>session('tutor_id')];
            $isUserExists = $table->where($whereClause)->first();
            if($isUserExists){
                //update the record
                $formData['created_at'] = $isUserExists->created_at;
                $formData['updated_at'] = $now;
                $table->where($whereClause)->update($formData);
                return redirect()->back()->with('success','Basic Information Updated');

            }

            $table->insert($formData);
            return redirect()->back()->with('success','Basic Information Created');

        }

        $whereClause = ['id'=>session('tutor_id')];
        $tutor = User::where($whereClause)->first();
        $basicInfo = DB::table('basic_infos')->where(['user_id'=>$tutor->id])->first();

        $templateData = [
            'races'=>Race::all(),
            'citizenships'=>Citizenship::all(),
            'schooltypes'=>SchoolType::all(),
            'basicInfo'=>$basicInfo,
            'user'=>$tutor



        ];


        return view('application.dashboard.basic-info',$templateData);


    }


    public function updateEducationInformation(Request $request){

        $user = session('tutor_id');
        $whereClause = ['user_id'=>$user];
        $table = DB::table('education_infos');

        $educationInfo = $table->where($whereClause)->first();

        if($request->method() == 'POST'){

            $category = $request->tutorrole;
            $formData = [

                'user_id' =>$user,
                'category'=>$category,
                'is_nie_trained'=>$request->is_nie_trained,
                'highest_qualification'=>$request->highest_qualification,

            ];

            if($category == "Full Time Student"){
                $formData['sub_category'] = $request->sub_category_students;
            }else{
                $formData['sub_category'] = $request->sub_category_students_moe;
                $formData['moe_email'] = $request->moe_email;
            }

            if($educationInfo){
                $table->where($whereClause)->update($formData);
                return redirect()->back()->with('success','Record Updated Successfully');
            }

            $table->insert($formData);
            return redirect()->back()->with('success','Education Record Added Successfully');

        }

        $templateData = [
            'moespecs'=>MoeTutorSpecification::all(),
            'schooltypes'=>SchoolType::all(),
            'qualifications'=>Qualification::all(),
            'student_categories'=>StudentCategory::all(),
            'education'=>$educationInfo


        ];


        return view('application.dashboard.education-info',$templateData);
    }


    public function addNewEducationTimeline(Request $request){


        $user = session('tutor_id');

        $education = DB::table('education_infos')->where([
            'user_id'=>$user
        ])->first();


        $formData = [
            'user_id'=>$user,
            'education_id'=>$education->education_id,
            'school_level'=>$request->school_level,
            'school_name'=>$request->school_name,
            'start_month'=>$request->start_month,
            'start_year'=>$request->start_year,
            'end_month'=>$request->end_month,
            'end_year'=>$request->end_year,
            'achievements'=>$request->achievements,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $school_level = $request->school_level;   //array of school level
        $deploma_degree_others = [6,7,8];


        if(in_array($school_level,$deploma_degree_others)){
            //get the majors

            $formData['subjects_or_majors'] = json_encode($request->course_name);
        }else{
            $data = array();
            for($iterator = 0;$iterator < count($request->subject);$iterator++){
                $data[$iterator] = (object)
                    ['subject'=>$request->subject[$iterator],'grade'=>$request->grade[$iterator]];
            }
            $formData['subjects_and_grades'] =  json_encode($data);
        }


        $timeline = DB::table('tutor_school_courses');
        if(isset($request->timeline_id)){

           $whereClause = ['_id'=>$request->timeline_id];
           $previous = $timeline->where($whereClause)->first();

           $formData['created_at'] = $previous->created_at;
           $formData['updated_at'] = Carbon::now();
           $timeline->where($whereClause)->update($formData);

           return response()->json(['timeline_id'=>$request->timeline_id]);
        }

        $timeline->insert($formData);
        return response()->json(['timeline_id'=>DB::getPdo()->lastInsertId()]);

    }



    public function updateExperienceInformation(Request $request,$action = null){
        if($request->method() == 'POST'){
            //post feature
            if($action == 'music'){


                //update the music information for tutor
                $formData  = [
                    'is_fulltime_music_teacher'=>isset($request->is_fulltime_music_teacher) ? 1:0,
                    'theory_level'=>$request->thoery_level,
                    'other_music_details'=>$request->other_music_details,
                    'no_of_years_experience'=>$request->no_of_years_experience,
                    'is_taught_in_school'=>$request->is_taught_in_school,
                    'taught_in_school_details'=>$request->taught_in_school_details,
                    'is_taught_in_private'=>$request->is_taught_in_private,
                    'taught_in_private_details'=>$request->taught_in_private_details,
                    'user_id'=>session('tutor_id'),
                    'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()

                ];



                $data = array();
                for($index = 0,$iterator = 0;$index < count($request->instrument);$index++){

                    $isnull = $request->instrument[$index] == null || $request->practical_level[$index]==null ||$request->achievements[$index]==null;

                    if(!$isnull){
                        $data[$iterator] = (object)[
                            'instrument'=>$request->instrument[$index],
                            'practical_level'=>$request->practical_level[$index],
                            'achievements'=>$request->achievements[$index]
                        ];
                        $iterator+=1;
                    }

                }



                $formData['proficiencies'] = json_encode($data);;

                DB::table('music_experiences')->insert($formData);

                return redirect()->route('tutor.profile.experience_info')->with('success','Music Record updated');

            }


            //update the academic information for tutor
            $formData = [

                'is_taught_in_moe'=>$request->is_taught_in_moe,
                'user_id'=>session('tutor_id'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()

            ];

            if($request->is_taught_in_moe == 'Yes'){
                $formData['moe_number_experience'] = $request->moe_number_experience;

                $data = array();
                for($iterator = 0;$iterator < count($request->level);$iterator++){
                    $data[$iterator] = (object)[
                        'level'=>$request->level[$iterator],
                        'subject'=>json_encode($request->subjects[$iterator]),
                        'school'=>$request->school[$iterator],
                        'years_taught'=>$request->years_taught[$iterator],
                        'last_taught'=>$request->last_taught
                    ];

                }

                $formData['moe_experiences'] = json_encode($data);
            }


            $formData['private_number_experience'] = $request->private_number_experience;

            $data = array();
            for($iterator = 0;$iterator < count($request->private_level);$iterator++){
                $data[$iterator] = (object)[
                    'level'=>$request->private_level[$iterator],
                    'subject'=>json_encode($request->private_subjects[$iterator]),
                    'school'=>$request->private_school[$iterator],
                    'years_taught'=>$request->private_years_taught[$iterator],
                    'last_taught'=>$request->private_last_taught
                ];

            }


            $formData['private_experiences'] = json_encode($data);
            $formData['students_taught'] = json_encode($request->students_taught);

            DB::table('academic_experiences')->insert($formData);
            return redirect()->back()->with('success','Academic Information inserted successfully');
        }


        $academic = DB::table('academic_experiences')->where(['user_id'=>session('tutor_id')])->count();
        $music  = DB::table('music_experiences')->where(['user_id'=>session('tutor_id')])->count();
        $templateData = [
            'subjects'=>Subject::all(),
            'levels'=>Level::all(),
            'instruments'=>Instrument::all(),
            'academic'=>$academic,
            'music'=>$music
        ];


        return view('application.dashboard.experience-info',$templateData);
    }
}
