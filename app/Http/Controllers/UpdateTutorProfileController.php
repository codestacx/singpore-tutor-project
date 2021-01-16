<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use App\Models\MoeTutorSpecification;
use App\Models\Qualification;
use App\Models\Race;
use App\Models\SchoolType;
use App\Models\StudentCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

        if($request->method() == 'POST'){

            dd();
        }

        $templateData = [
            'moespecs'=>MoeTutorSpecification::all(),
            'schooltypes'=>SchoolType::all(),
            'qualifications'=>Qualification::all(),
            'student_categories'=>StudentCategory::all(),


        ];


        return view('application.dashboard.education-info',$templateData);
    }
}
