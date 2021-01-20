<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use App\Models\Grade;
use App\Models\Instrument;
use App\Models\Level;
use App\Models\Location;
use App\Models\MoeTutorSpecification;
use App\Models\Race;
use App\Models\Rate;
use App\Models\SchoolType;
use App\Models\StudentCategory;
use App\Models\Subject;
use App\Models\TutorRequest;
use App\Models\TutorTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function welcome(Request $request){
        return view('admin.welcome');
    }

    public function levels(Request $request, $action = null, $level = null){

        $table = DB::table('levels')->orderBy('id','DESC');

        if($action == 'create'){
            $levels = $table->get();
            return view('admin.levels.create',compact('levels'));
        }
        if($action == 'delete'){
            //delete grade
            $table->where('id',$request->input('level'))->delete();
            return redirect()->back()->with('success','Level Removed Successfully');
        }
        if($action == 'update'){
            //update grade & save
            $level_edit = DB::table('levels')->where('id',$request->input('level'))->first();
            $levels = $table->get();
            return view('admin.levels.create',compact('level_edit','levels'));
        }


        if($request->method() == 'POST'){

            $formData = [
                    'level_title'           =>  $request->input('title'),
                    'active'                =>  $request->input('is_active'),
                    'created_at'            => Carbon::now()->toDateTimeString(),
                    'updated_at'            => Carbon::now()->toDateTimeString()
            ];
            if(isset($request->level_id)){
                $table->where('id',$request->input('level_id'))->update($formData);
              return redirect()->route('admin.levels')->with('success','Level updated Successfully');
            }

              DB::table('levels')->insert($formData);
             // $levels = $table->get();
             // return view('admin.levels.create',compact('levels'));
//              return redirect()->route('admin.levels')->with('success','Level add successfully');
        }

        $levels = $table->get();
        return view('admin.levels.create',compact('levels'));

    }

    public function grades(Request $request, $action = null, $grade = null){

        $table = DB::table('grades');
        $levels = Level::all();

        $grades = $table->join('levels','levels.id','=','grades.level_id')->get();

        if($request->method() == 'POST'){
            $formData = [
                'grade_title'=>$request->title,
                'level_id'=>$request->level
            ];
            if(isset($request->grade)){
                $table->where('grade_id',$request->grade)->update($formData);
                return redirect()->route('admin.grades')->with('success','Grade updated Successfully');
            }
            $table->insert($formData);
            return redirect()->route('admin.grades')->with('success','Grade Added Successfully');
        }
        if(!is_null($grade)){

            if($action == 'delete'){
                //delete grade
                $table->where('grade_id',$grade)->delete();
                return redirect()->back()->with('success','Grade Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $grade = $table->where('grade_id',$grade)->first();

                return view('admin.grades.create',compact('grades','grade','levels'));
            }

        }
        return view('admin.grades.create',compact('grades','levels'));

    }

    public function faqs(Request $request, $action = null, $faq = null){
        $table = DB::table('faqs');
        $categories = DB::table('faqs_categories')->get();
        $faqs = $table->join('faqs_categories','faqs_categories.id','=','faqs.faq_cat_id')->get();

        if($request->method() == 'POST'){


            $formData = [
                'question'=>$request->question,
                'answer'=>$request->answer,
                'faq_cat_id'=>$request->faq_cat_id
            ];



            if(isset($request->faq)){

                $table->where('_id',$request->faq)->update($formData);
                return redirect()->route('admin.faqs')->with('success','FAQ updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.faqs')->with('success','FAQ Added Successfully');

            //request is hit either from post or update form

        }


        if(!is_null($faq)){


            if($action == 'delete'){
                //delete grade
                $table->where('_id',$faq)->delete();
                return redirect()->back()->with('success','Grade Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $faq = $table->where('_id',$faq)->first();


                return view('admin.faqs.index',compact('faq','categories','faqs'));
            }

        }


        if($action == 'create'){
            return view('admin.faqs.create',compact('categories'));
        }




        return view('admin.faqs.index',compact('faqs','categories'));

    }

    public function subjects(Request $request, $action = null, $subject = null){
        $table = DB::table('subjects');

        $subjects = Subject::all();

        if($request->method() == 'POST'){


            $formData = ['subject_title'=>$request->title];



            if(isset($request->subject)){

                $table->where('subject_id',$request->   subject)->update($formData);
                return redirect()->route('admin.subjects')->with('success','Subject updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.subjects')->with('success','Subject Added Successfully');


        }


        if(!is_null($subject)){


            if($action == 'delete'){
                //delete grade
                $table->where('subject_id',$subject)->delete();
                return redirect()->back()->with('success','Subject Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $subject = $table->where('subject_id',$subject)->first();


                return view('admin.subjects.index',compact('subject','subjects'));
            }

        }

        return view('admin.subjects.index',compact('subjects'));

    }

    public function locations(Request $request, $action = null, $location = null){
        $table = DB::table('locations');

        $locations = Location::with('places')->get();

        if($request->method() == 'POST'){


            $formData = ['location_title'=>$request->title];



            if(isset($request->location)){

                $table->where('location_id',$request->location)->update($formData);
                return redirect()->route('admin.locations')->with('success','Location updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.locations')->with('success','Location Added Successfully');


        }


        if(!is_null($location)){

            if($action == 'delete'){
                //delete grade
                $table->where('location_id',$location)->delete();
                return redirect()->back()->with('success','Location Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $location = $table->where('location_id',$location)->first();


                return view('admin.locations.index',compact('location','locations'));
            }

        }

        return view('admin.locations.index',compact('locations'));

    }


    public function instruments(Request $request, $action = null, $instrument = null){
        $table = DB::table('instruments');

        $instruments = Instrument::all();

        if($request->method() == 'POST'){
            $formData = ['title'=>$request->title];

            if(isset($request->instrument)){

                $table->where('id',$request->instrument)->update($formData);
                return redirect()->route('admin.instruments')->with('success','Instrument updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.instruments')->with('success','Instrument Added Successfully');


        }


        if(!is_null($instrument)){

            if($action == 'delete'){
                //delete grade
                $table->where('id',$instrument)->delete();
                return redirect()->back()->with('success','Instrument Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $instrument = $table->where('id',$instrument)->first();


                return view('admin.instruments.index',compact('instrument','instruments'));
            }

        }

        return view('admin.instruments.index',compact('instruments'));

    }

    public function races(Request $request, $action = null, $race = null){
        $table = DB::table('races');

        $races = Race::all();

        if($request->method() == 'POST'){
            $formData = ['title'=>$request->title];

            if(isset($request->race)){

                $table->where('id',$request->race)->update($formData);
                return redirect()->route('admin.races')->with('success','Race updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.races')->with('success','Race Added Successfully');


        }


        if(!is_null($race)){

            if($action == 'delete'){
                //delete grade
                $table->where('id',$race)->delete();
                return redirect()->back()->with('success','Race Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $race = $table->where('id',$race)->first();

                return view('admin.races.index',compact('race','races'));
            }

        }

        return view('admin.races.index',compact('races'));

    }


    public function places(Request $request, $action = null, $place = null){

        $table = DB::table('places');
        $locations = Location::all();

        $places = $table->join('locations','locations.location_id','=','places.location')->get();

        if($request->method() == 'POST'){
            $formData = [
                'place'=>$request->title,
                'location'=>$request->location
            ];
            if(isset($request->place)){
                $table->where('id',$request->place)->update($formData);
                return redirect()->route('admin.places')->with('success','Place updated Successfully');
            }
            $table->insert($formData);
            return redirect()->route('admin.places')->with('success','Place Added Successfully');
        }
        if(!is_null($place)){

            if($action == 'delete'){
                //delete place
                $table->where('id',$place)->delete();
                return redirect()->back()->with('success','Place Removed Successfully');
            }

            if($action == 'update'){
                //update place & save
                $place = $table->where('id',$place)->first();
                return view('admin.places.index',compact('places','place','locations'));
            }

        }
        return view('admin.places.index',compact('places','locations'));

    }


    public function schools(Request $request, $action = null, $school = null){
        $table = DB::table('school_types');

        $schools = SchoolType::all();

        if($request->method() == 'POST'){


            $formData = ['type'=>$request->type];



            if(isset($request->school)){

                $table->where('id',$request->school)->update($formData);
                return redirect()->route('admin.schools')->with('success','School updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.schools')->with('success','School Added Successfully');


        }


        if(!is_null($school)){


            if($action == 'delete'){
                //delete grade
                $table->where('id',$school)->delete();
                return redirect()->back()->with('success','School Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $school = $table->where('id',$school)->first();


                return view('admin.schools.index',compact('school','schools'));
            }

        }

        return view('admin.schools.index',compact('schools'));

    }


    public function citizenships(Request $request, $action = null, $citizenship = null){
        $table = DB::table('citizenships');

        $citizenships = Citizenship::all();

        if($request->method() == 'POST'){


            $formData = ['name'=>$request->name];



            if(isset($request->citizenship)){

                $table->where('id',$request->citizenship)->update($formData);
                return redirect()->route('admin.citizenships')->with('success','Citizenship updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.citizenships')->with('success','Citizenship Added Successfully');


        }


        if(!is_null($citizenship)){


            if($action == 'delete'){
                //delete grade
                $table->where('id',$citizenship)->delete();
                return redirect()->back()->with('success','Citizenship Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $citizenship = $table->where('id',$citizenship)->first();


                return view('admin.citizenship.index',compact('citizenship','citizenships'));
            }

        }

        return view('admin.citizenship.index',compact('citizenships'));

    }

    public function students(Request $request, $action = null, $category = null){
        $table = DB::table('student_categories');

        $categories = StudentCategory::all();

        if($request->method() == 'POST'){


            $formData = ['category'=>$request->title];



            if(isset($request->category)){

                $table->where('student_categories_id',$request->category)->update($formData);
                return redirect()->route('admin.categories.students')->with('success','Category updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.categories.students')->with('success','Category Added Successfully');


        }


        if(!is_null($category)){


            if($action == 'delete'){
                //delete grade
                $table->where('student_categories_id',$category)->delete();
                return redirect()->back()->with('success','Category Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $category = $table->where('student_categories_id',$category)->first();

                return view('admin.categories.students.index',compact('category','categories'));
            }

        }

        return view('admin.categories.students.index',compact('categories'));

    }

    public function moetutors(Request $request, $action = null, $category = null){
        $table = DB::table('moe_tutor_specifications');

        $categories = MoeTutorSpecification::all();

        if($request->method() == 'POST'){


            $formData = ['specification'=>$request->specification];



            if(isset($request->category)){

                $table->where('id',$request->category)->update($formData);
                return redirect()->route('admin.categories.tutors')->with('success','Category updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.categories.tutors')->with('success','Category Added Successfully');


        }


        if(!is_null($category)){


            if($action == 'delete'){
                //delete grade
                $table->where('id',$category)->delete();
                return redirect()->back()->with('success','Category Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $category = $table->where('id',$category)->first();

                return view('admin.categories.tutors.index',compact('category','categories'));
            }

        }

        return view('admin.categories.tutors.index',compact('categories'));

    }

    public function tutor_types(Request $request, $action = null, $type = null){
        $table = DB::table('tutor_types');

        $types = TutorTypes::all();

        if($request->method() == 'POST'){


            $formData = ['type'=>$request->title];



            if(isset($request->type)){

                $table->where('id',$request->type)->update($formData);
                return redirect()->route('admin.tutor_types')->with('success','Tutor Type updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.tutor_types')->with('success','Tutor Type Added Successfully');


        }


        if(!is_null($type)){


            if($action == 'delete'){
                //delete grade
                $table->where('id',$type)->delete();
                return redirect()->back()->with('success','Tutor Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $type = $table->where('id',$type)->first();


                return view('admin.tutor-types.index',compact('type','types'));
            }

        }

        return view('admin.tutor-types.index',compact('types'));

    }

    public function rates(Request $request, $action = null, $rate = null){

        $table = DB::table('rates');
        $rates = Rate::with(['grades','categories'])->get();
        $categories = TutorTypes::all();
        $grades = Grade::all();



        //$rates = $table->join('levels','levels.id','=','grades.level_id')->get();

        if($request->method() == 'POST'){
            $formData = [

                'rate'=>$request->title,
                'grade'=>$request->grade,
                'category'=>$request->category
            ];

            if(isset($request->rate)){
                $table->where('rate_id',$request->rate)->update($formData);
                return redirect()->route('admin.rates')->with('success','Rate updated Successfully');
            }
            $table->insert($formData);
            return redirect()->route('admin.rates')->with('success','Rate Added Successfully');
        }
        if(!is_null($rate)){

            if($action == 'delete'){
                //delete grade
                $table->where('rate_id',$rate)->delete();
                return redirect()->back()->with('success','Rate Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $rate = $table->where('rate_id',$rate)->first();

                return view('admin.rates.index',compact('rates','rate','categories','grades'));
            }

        }
        return view('admin.rates.index',compact('rates','categories','grades'));

    }


    public function tutor_requests(Request $request, $id = null ){

        if(!is_null($id)){
            $tutor_request = DB::table('tutor_requests')->where('tutor_request_id',$id)->first();
           // dd(Subject::where('subject_id',2)->first());

            $subjects = Subject::all();
            $grades = Grade::all();
            $requests = DB::table('tutor_request_students')
                ->join('grades','tutor_request_students.grade','=','grades.grade_id')
                ->where([
                    'tutor_request_id'=>$tutor_request->tutor_request_id
                ])->get();

            foreach ($requests as &$req){
                $subj = json_decode($req->subjects);
                $req->subject_names = array_map(function ($sub){
                    return Subject::where('subject_id',$sub)->value('subject_title');
                },$subj);

            }


            return view('admin.requests.view_details',['request'=>$tutor_request,'requests'=>$requests]);
        }

        $requests = DB::table('tutor_requests')->get();
        return view('admin.requests.index',compact('requests'));
    }


    public function tution_assignments(Request $request){

        if($request->method() == 'POST'){
            dd($request->all());
        }

    }


}
