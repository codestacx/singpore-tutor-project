<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AppliedAssignments;
use App\Models\Assignment;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Location;
use App\Models\Rate;
use App\Models\Subject;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use function GuzzleHttp\json_decode;

class HomeController extends Controller
{
    public function index(Request $request){
        $levels = Level::with('grades')->get();
        $subjects = Subject::all();

        $rates = Rate::with(['grades','categories'])->get();
        return view('welcome',compact('levels','subjects','rates'));
    }



    public function getTutorRequestRow(Request $request){
        return Helper::prepareTutorRequestRow();
    }

    public function faqs(Request $request){

        $faqs = DB::table('faqs')->join('faqs_categories','faqs_categories.id','=','faqs.faq_cat_id')->get();
        $categories = DB::table('faqs_categories')->get();
        return view('pages.faqs.index',compact('faqs','categories'));
    }

    public function aboutus(Request $request){
        return view('pages.aboutus.aboutus');
    }


    public function contact(Request $request){


        if($request->method() == 'POST'){
            //create contact request & save in database
            DB::table('contacts')->insert(
                [
                    'name'          =>  $request->input('c_name'),
                    'email'         =>  $request->input('c_email'),
                    'message'       =>  $request->input('message'),
                    'created_at'    => Carbon::now()->toDateTimeString(),
                    'updated_at'    => Carbon::now()->toDateTimeString()
                ]
            );

            return redirect()->back()->with('success','Your request has been dispatched successfully');
        }
        return view('pages.contact.index');
    }


    public function tutionrates(Request $request){

        $levels = Level::with('grades')->get();
        return view('pages.tution_rates.index',compact('levels'));
    }


    public function tuition_assignments(Request $request,$action = null){



        $templateData = [

            'subjects'=>Subject::all(),
            'levels'=>Level::with('grades')->get(),
            'locations'=>Location::with('places')->get()

        ];

        $templateData['assignments'] = Assignment::with(['info','request'])->get();
        if($request->method() == 'POST'){

            if(!is_null($action)){
                //request by tutor
                DB::table('applied_assignments')->insert([
                    'assignment_id'=>$request->assignment_id,
                    'tutor_id'=>session('tutor_id'),
                    'details'=>$request->details
                ]);
                return redirect()->route('site.tuition_assignments')->with('success','Application dispatched successfully');
            }


            if(isset($request->code)){
                $templateData['assignments'] = Assignment::with(['info','request'])->where('code',$request->code)->get();
                return view('pages.assignments.index',$templateData);

            }


            $assignments = Assignment::with(['info','request'])->where('location',$request->location)->get();   //get all assignments by location

            $subject = $request->subject;
            $level = $request->level;


            $this->sanitizeWithSubject($assignments,$subject);
            $this->sanitizeWithLevel($assignments,$level);

            $templateData['assignments'] = $assignments;

        }

        if($request->session()->has('tutor_id') && !is_null(session('tutor_id'))){
            $applied_assignments = AppliedAssignments::where('tutor_id',session('tutor_id'))->pluck('assignment_id')->all();
            foreach ($templateData['assignments'] as &$assignment){

                if(in_array($assignment->assignment_id,$applied_assignments)){
                    $assignment->applied = true;
                }else{
                    $assignment->applied = false;
                }
            }
        }




        return view('pages.assignments.index',$templateData);
    }


    private function sanitizeWithSubject(&$assignments,$subject){

        foreach ($assignments as &$assignment){
            foreach ($assignment->request as $request){
               // dd($request->subjects);
                if(in_array($subject,($request->subjects))){
                    $assignment->marked = true;
                    break;
                }
            }
        }
    }

    private function sanitizeWithLevel(&$assignments,$level){
        foreach ($assignments as &$assignment){

            if(isset($assignment->marked)){
                $grades = json_decode($assignment->info->grade);

                $levels = array_map(function ($grade){
                    return Grade::where(['grade_id'=>$grade])->first()->level_id;
                },$grades);

                if(in_array($level,array_unique($levels))){
                    $assignment->filtered = true;
                }
            }
        }
    }
}
