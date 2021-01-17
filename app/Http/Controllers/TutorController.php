<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Citizenship;
use App\Models\EducationInfo;
use App\Models\Level;
use App\Models\MoeTutorSpecification;
use App\Models\MusicExperience;
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
use function GuzzleHttp\json_encode;

class TutorController extends Controller
{


    public function index(Request $request){

        $user = User::find(session('tutor_id'));
        return redirect()->route('tutor.update_info');
        if($user->profile_updated == 0){
            return redirect()->route('tutor.update_info');
        }
        return view('tutor.welcome',['user'=>$user]);
    }


    public function tutor_request(Request $request){
        $formData = [
          'fname'=>$request->fname,
            'lname'=>$request->lname,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'description'=>$request->description,
            'grade'=>json_encode($request->level_grade['grades'])
        ];

        $status = DB::table('tutor_requests')->insert($formData);
        return redirect()->back()->with('success','Request Disptached successfully');

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
                case 'preferences':
                    $this->updatePreference($request);break;
                case 'experience-info':
                   $this->experienceInformation($request);
                   break;
                case 'document-info':
                     $this->updateDocument($request);
                    break;
            }
            return;
        }

        $whereClause = ['id'=>session('tutor_id')];
        $tutor = User::where($whereClause)->first();
//        if($tutor->profile_updated == 1){
//            return redirect()->route('tutor.dashboard');
//        }




        $basicInfo = DB::table('basic_infos')->where(['user_id'=>$tutor->id])->first();
        $educationInfo = DB::table('education_infos')->where(['user_id'=>$tutor->id])->first();


        $educationInfoCourses = isset($educationInfo) ?
         DB::table('tutor_school_courses')->where(['education_id'=>$educationInfo->education_id])->get():
            null;


        $templateData = [
            'races'=>Race::all(),
            'citizenships'=>Citizenship::all(),
            'schooltypes'=>SchoolType::all(),
            'qualifications'=>Qualification::all(),
            'basicInfo'=>$basicInfo,
            'user'=>User::find(session('tutor_id')),
            'moespecs'=>MoeTutorSpecification::all(),
            'student_categories'=>StudentCategory::all(),
            'education'=>$educationInfo,
            'educationInfoCourses'=>$educationInfoCourses
        ];


        return view('tutor.update_info',$templateData);
    }




    public function getAcademicExperienceRow(Request $request){

        $levels = Level::all();
        $subjects = Subject::all();
        ob_start();
        ?>


        <?php if($request->row != 'private'):?>
        <tr>
            <td>
                <i class="fa fa-trash" style="cursor:pointer;color: #b21f2d" onclick="this.parentNode.parentNode.remove()"></i>
            </td>
            <td class="">
                <select name="level[]" class="form-control sl-form-control">
                    <option selected disabled>Level </option>
                    <?php foreach($levels as $level):?>
                        <option value="<?php echo $level->id?>"><?=$level->level_title?></option>

                    <?php endforeach;?>

                </select></td>

            <td>
                <select name="subjects[<?=$request->index?>][]"  class="selectpicker show-menu-arrow" multiple >
                    <?php foreach($subjects as $subject):?>
                        <option value="<?=$subject->subject_id?>"><?=$subject->subject_title?></option>
                    <?php endforeach;?>
                </select>
            </td>

            <td>
                <input type="text" style="width: 150px;"  name="school[]" id="" />
            </td>

            <td class=""><input name="years_taught[]" type="text"  style="width: 60px;"/> </td>

            <td class=""><input  name="last_taught[]" type="text" style="width: 60px;" /></td>

        </tr>
        <?php else:?>
            <tr>
            <td>
                <i class="fa fa-trash" style="cursor:pointer;color: #b21f2d" onclick="this.parentNode.parentNode.remove()"></i>
            </td>
            <td class="">
                <select name="private_level[]" class="form-control sl-form-control">
                    <option selected disabled>Level </option>
                    <?php foreach($levels as $level):?>
                        <option value="<?php echo $level->id?>"><?=$level->level_title?></option>

                    <?php endforeach;?>

                </select></td>

            <td>
                <select name="private_subjects[<?=$request->index?>][]"  class="selectpicker show-menu-arrow" multiple >
                    <?php foreach($subjects as $subject):?>
                        <option value="<?=$subject->subject_id?>"><?=$subject->subject_title?></option>
                    <?php endforeach;?>
                </select>
            </td>

            <td>
                <input type="text" style="width: 150px;"  name="private_school[]" id="" />
            </td>

            <td class=""><input name="private_years_taught[]" type="text"  style="width: 60px;"/> </td>

            <td class=""><input  name="private_last_taught[]" type="text" style="width: 60px;" /></td>
        <?php endif;?>
        <?php
        return ob_get_clean();
    }

    private function experienceInformation($request){
        $formData = [

            'is_taught_in_moe'=>$request->is_taught_in_moe,
            'user_id'=>session('tutor_id')

        ];

        if($request->is_taught_in_moe){
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



        // music information

        $formData  = [
            'is_fulltime_music_teacher'=>$request->is_fulltime_music_teacher,
            'theory_level'=>$request->thoery_level,
            'other_music_details'=>$request->other_music_details,
            'no_of_years_experience'=>$request->no_of_years_experience,
            'is_taught_in_school'=>$request->is_taught_in_school,
            'taught_in_school_details'=>$request->taught_in_school_details,
            'is_taught_in_private'=>$request->is_taught_in_private,
            'taught_in_private_details'=>$request->taught_in_private_details,
            'user_id'=>session('tutor_id')

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
        dd(DB::getPdo()->lastInsertId());

    }

    public function updateEducationInformation($request,$levels){


        $user = session('tutor_id');
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




        $isAlreadyUp = DB::table('education_infos')->where([
            'user_id'=>$user
        ])->first();

        if($isAlreadyUp){
            DB::table('education_infos')->where([
                'user_id'=>$user
            ])->delete();
        }

        $educationInfo = EducationInfo::create($formData);


        $school_level = $request->school_level;   //array of school level


        $school_name = $request->school_name;    // array of school name

        $start_month = $request->start_month;
        $start_year = $request->start_year;

        $end_month = $request->end_month;
        $end_year = $request->end_year;

        $achievements = $request->achievements;   //achievements

       // dd($request);


        for($index = 0;$index < count($levels);$index++){

            $formData = [
                'education_id' =>$educationInfo->id,
                'user_id'=>$user,
                'school_level'=>$levels[$index],
                'school_name'=>$school_name[$index],
                'start_month'=>$request->start_month[$index],
                'start_year'=>$request->start_year[$index],
                'end_month'=> $request->end_month[$index],
                'end_year'=>$request->end_year[$index],
                'achievements'=>$request->achievements[$index]
            ];
            $deploma_degree_others = [6,7,8];

            if(in_array($levels[$index],$deploma_degree_others)){

                $formData['subjects_or_majors'] = json_encode($request->course_name[$index]);

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

    private function updatePreference($request){
       // dd($request->all());
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
                    'subject'=>$subject
                );

            }
        }

       $id = TutorTaught::insert($records);
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


    public function updateDocument($request){
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
           dd(DB::getPdo()->lastInsertId());
    }



    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('site.home');
    }

}
