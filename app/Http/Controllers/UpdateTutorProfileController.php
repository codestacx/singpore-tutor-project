<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use App\Models\Document;
use App\Models\Grade;
use App\Models\Instrument;
use App\Models\Level;
use App\Models\Location;
use App\Models\MoeTutorSpecification;
use App\Models\Preference;
use App\Models\Qualification;
use App\Models\Race;
use App\Models\SchoolType;
use App\Models\StudentCategory;
use App\Models\Subject;
use App\Models\TutorTaught;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

class UpdateTutorProfileController extends Controller{


    private $viewpath;
    public function __construct(){

        $this->viewpath = 'application.dashboard.';
        $this->middleware(function ($request,$next){
           $user_id = (session('tutor_id'));
            $tutor = User::where([
                'id' => $user_id
            ])->with('basicinfo')->first();

            View::share(['tutor'=>$tutor]);
            return ($next)($request);
        });

    }



    public function index(Request $request){
        return view($this->viewpath.'welcome');
    }

    public function updateBasicInformation(Request $request){


        if($request->method() == 'POST'){
            //update the basic information


            $image = uploadFile([$request->file],'profiles/'.$request->fullname.'/')[0];
            $user = User::find(session('tutor_id'));
            $user->name = $request->fullname;
            $user->save();

            session()->put('tutor_name',$user->name);
            $now = Carbon::now();
            $formData = [
                'profile_image'=>$image,
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
            $now = Carbon::now();
            $formData = [

                'user_id' =>$user,
                'category'=>$category,
                'is_nie_trained'=>$request->is_nie_trained,
                'highest_qualification'=>$request->highest_qualification,
                'created_at'=>$now,
                'updated_at'=>$now

            ];

            if($category == "Full Time Student"){
                $formData['sub_category'] = $request->sub_category_students;
            }else{
                $formData['sub_category'] = $request->sub_category_students_moe;
                $formData['moe_email'] = $request->moe_email;
            }

            if($educationInfo){
                $formData['updated_at']=Carbon::now();
                $table->where($whereClause)->update($formData);
                return redirect()->back()->with('success','Record Updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('tutor.profile.education_info')->with('success','Education Record Added Successfully');

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

    public function updatePreferences(Request $request){

        if($request->method() == 'POST'){
            $now = Carbon::now();
            $formData = [
                'availability_at_student_home'=>isset($request->availability_at_student_home) ? $request->availability_at_student_home:0,
                'availability_at_tutor_home'=>isset($request->availability_at_tutor_home) ? $request->availability_at_tutor_home:0,
                'tutor_home_postal'=>$request->tutor_home_postal,
                'class_criteria'=>$request->class_criteria,
                'description'=>$request->description,
                'location'=>json_encode($request->location),
                'lower_primary_rate'=>$request->lower_primary_rate,
                'upper_primary_rate'=>$request->upper_primary_rate,
                'lower_secondary_rate'=>$request->lower_secondary_rate,
                'uper_secondary_rate'=>$request->uper_secondary_rate,
                'jc_rate'=>$request->jc_rate,
                'created_at'=>$now,
                'updated_at'=>$now,
                'user_id'=>session('tutor_id')
            ];


            DB::table('preferences')->insert($formData);
            $prefernce_id = DB::getPdo()->lastInsertId();
            $records = [];

            $iterator  = 0;
            foreach ($request->levels as $key=>$level){

                $KEY = explode('_',$key);

                $grade_id = $KEY[1];
                $level_id = $KEY[2];


                foreach ($level as $subject){
                    $records[$iterator++] = array(
                        'preference_id'=>$prefernce_id,
                        'level'=>$level_id,
                        'grade'=>$grade_id,
                        'subject'=>$subject,
                        'created_at'=>$now,
                        'updated_at'=>$now
                    );

                }
            }

            $id = TutorTaught::insert($records);
           return redirect()->route('tutor.profile.preference_info')->with('success','Preferences Updated');
        }


        $locations = Location::with('places')->get();
        $primary_grades = Grade::where(['level_id'=>1])->get();
        $secondary_grades = Grade::where(['level_id'=>2])->get();
        $jc_grades = Grade::where(['level_id'=>3])->get();
        $others_grades = Grade::where(['level_id'=>4])->get();
        $subjects = Subject::all();

        $preferences = Preference::where([
            'user_id'=>session('tutor_id')
        ])->count();

        $templateData = [
            'locations'=>$locations,
            'subjects'=>$subjects,
            'primary_grades'=>$primary_grades,
            'secondary_grades'=>$secondary_grades,
            'jc_grades'=>$jc_grades,
            'others_grades'=>$others_grades,
            'preference' =>$preferences > 0 ? true:false
        ];
        return view('application.dashboard.preferences',$templateData);
    }

    public function updateDocuments(Request $request){
        if($request->method() == 'POST'){

            $user = User::find(session('tutor_id'));
            $formData = [
                'certificates'=>json_encode(uploadFile($request->certificates,'tutor/'.$user->name.'/documents')),
                'proof_citizenship'=>uploadFile([$request->proof_citizenship],'tutor/'.$user->name.'/documents')[0],
                'photo_id'=>uploadFile([$request->photo_id],'tutor/'.$user->name.'/documents')[0],
                'recent_photo'=>uploadFile([$request->recent_photo],'tutor/'.$user->name.'/documents')[0],
                'supported_documents'=>json_encode(uploadFile($request->supported_documents,'tutor/'.$user->name.'/documents')),
                'user_id'=>$user->id
            ];

            DB::table('documents')->insert($formData);
            DB::table('users')->where(['id'=>session('tutor_id')])
                ->update(['profile_updated'=>1]);

            return redirect()->route('tutor.profile.document_info')->with('success','Document Information Added Successfully');
        }

        $document = Document::where([
            'user_id'=>session('tutor_id')
        ])->count();
        $document = $document > 0 ? true:false;
        return view('application.dashboard.documents',compact('document'));
    }

    public function account_privacy(Request $request,$action = null){

        if($request->method() == 'POST'){
            $password = $request->password;
            $cpassword = $request->cpassword;

            $compare = $password <=> $cpassword;
            if($compare != 0){
                return redirect()->back()->with('error','Password does not match');
            }

            $table = DB::table('users');
            $whereClause = ['id'=>session('tutor_id')];

            //do for post request
            if($request->action == 'change-password'){
                //change password request


                $table
                    ->where($whereClause)
                    ->update([
                        'password'=>Hash::make($request->password),
                        'updated_at'=>Carbon::now()
                    ]);
                return redirect()->back()->with('success','Password updated Successfully');
            }


            if($request->action == 'deactivate-account'){
                $user = $table->where($whereClause)->first();
                if(!Hash::check($password,$user->password)){
                    return redirect()->back()->with('error','Password is not correct');
                }


                $table->where($whereClause)->update([
                    'active_status'=>false || 0
                ]);



                $now = Carbon::now();
                DB::table('deactivates')->insert([
                    'reason'=>$request->reason,
                    'description'=>$request->description,
                    'user_id'=>session('tutor_id'),
                    'created_at'=>$now,'updated_at'=>$now
                ]);

                $request->session()->flush();

                return redirect()->route('site.user.login')->with('error','You account has been deactvated successfully');

            }



        }

        return view('application.dashboard.account-privacy');
    }

    public function notifications(Request $request){
        return view($this->viewpath.'notifications');
    }
}
