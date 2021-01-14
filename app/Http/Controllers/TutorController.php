<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Citizenship;
use App\Models\EducationInfo;
use App\Models\MoeTutorSpecification;
use App\Models\Qualification;
use App\Models\Race;
use App\Models\SchoolType;
use App\Models\StudentCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{


    public function index(Request $request){

        $user = User::find(session('tutor_id'));

        if($user->profile_updated == 0){
            return redirect()->route('tutor.update_info');
        }

        return view('tutor.welcome',['user'=>$user]);
    }

    public function update_info(Request $request){

        if($request->method() == 'POST'){


            $action = $request->action;
            switch ($action){
                case 'basic-info':
                    $this->updateBasicInfo($request);
                    break;
                case 'educational-info':

                    $this->updateEducationInformation($request,$request->school_level);
                    break;
            }

            return;
        }

        $whereClause = ['user_id'=>session('tutor_id')];
        $basicInfo = DB::table('basic_infos')->where($whereClause)->first();
        $templateData = [
            'races'=>Race::all(),
            'citizenships'=>Citizenship::all(),
            'schooltypes'=>SchoolType::all(),
            'qualifications'=>Qualification::all(),
            'basicInfo'=>$basicInfo,
            'user'=>User::find(session('tutor_id')),
            'moespecs'=>MoeTutorSpecification::all(),
            'student_categories'=>StudentCategory::all()
        ];
        return view('tutor.update_info',$templateData);
    }



    public function updateEducationInformation($request,$levels){


        $user = session('tutor_id');
        $category = $request->tutorrole;
        $formData = [

            'user_id'=>$user,
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




        $educationInfo = EducationInfo::create($formData);




        $school_level = $request->school_level;   //array of school level


        $school_name = $request->school_name;    // array of school name

        $start_month = $request->start_month;
        $start_year = $request->start_year;

        $end_month = $request->end_month;
        $end_year = $request->end_year;

        $achievements = $request->achievements;   //achievements


        for($index = 0;$index < count($levels);$index++){

            $formData = [
                'education_id' =>$educationInfo->id,
                'user_id'=>$user,
                'school_level'=>$levels[$index],
                'school_name'=>$school_name[$index],
                'start_month'=>$request->start_month[$index],
                'start_year'=>$request->start_year[$index],
                'end_month'=> $request->end_month[$index],
                'end_year'=>$request->end_year[$index]
            ];


//            $school_name  = $school_level[$index];
//
//            $start_month  = $request->start_month[$index];
//            $end_month    = $request->end_month[$index];
//
//            $start_year  =  $request->start_year[$index];
//            $end_year    =  $request->end_year[$index];

            $deploma_degree_others = [6,7,8];

            if(in_array($levels[$index],$deploma_degree_others)){

                $formData['subjects_and_grades'] = json_encode($request->course_name[$index]);

            }else{
                $subjects = $request->subject[$index];
                $grades = $request->grade[$index];
                $data = array();
                for($iterator = 0;$iterator < count((array)$subjects); $iterator++){
                    $data[$iterator] = (object)['subject'=>$subjects[$iterator],'grade'=>$grades[$iterator]];
                }

                $formData['subjects_and_grades'] = json_encode($data);

            }

            DB::table('tutor_school_courses')->insert($formData);

        }



        return response()->json(['status'=>true,'message'=>'data submitted']);



    }


    private function updateBasicInfo($request){


        //just update name in users table first //

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

            return response()->json(['message'=>'Basic Information Updated']);
        }

        $table->insert($formData);
        return response()->json(['message'=>'Basic Information Created']);

    }

    private function updateEmployeInfo($request){

    }
    public function registerationForm(Request $request){

        $templateData = [
            'races'=>Race::all(),
            'citizenships'=>Citizenship::all(),
            'schooltypes'=>SchoolType::all(),
            'qualifications'=>Qualification::all(),

            'user'=>User::find(session('tutor_id')),
            'moespecs'=>MoeTutorSpecification::all(),
            'student_categories'=>StudentCategory::all()
        ];

        return view('tutor.update_info',$templateData);
    }

    public function loadCard(Request $request){

        $id = $request;
        return Helper::loadCard($id);
    }



    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('site.home');
    }

}
