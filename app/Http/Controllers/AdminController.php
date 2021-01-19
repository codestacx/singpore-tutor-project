<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Instrument;
use App\Models\Level;
use App\Models\Location;
use App\Models\Race;
use App\Models\Subject;
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

        $locations = Location::all();

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
}
