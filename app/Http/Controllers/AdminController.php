<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function welcome(Request $request){
        return view('admin.welcome');
    }

    public function grades(Request $request, $action = null, $grade = null){

        $table = DB::table('grades');
        $levels = Level::all();

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

            //request is hit either from post or update form

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

                return view('admin.grades.create',compact('grade','levels'));
            }

        }


        if($action == 'create'){
            return view('admin.grades.create',compact('levels'));
        }
        $grades = $table->join('levels','levels.id','=','grades.level_id')->get();
        return view('admin.grades.index',compact('grades'));


    }

    public function faqs(Request $request, $action = null, $faq = null){
        $table = DB::table('faqs');
        $categories = DB::table('faqs_categories')->get();
        if($request->method() == 'POST'){


            $formData = [
                'question'=>$request->question,
                'answer'=>$request->question,
                'faq_cat_id'=>$request->faq_cat_id
            ];

            if(isset($request->faq)){

                $table->where('id',$request->faq)->update($formData);
                return redirect()->route('admin.faqs')->with('success','FAQ updated Successfully');
            }

            $table->insert($formData);
            return redirect()->route('admin.faqs')->with('success','FAQ Added Successfully');

            //request is hit either from post or update form

        }


        if(!is_null($faq)){


            if($action == 'delete'){
                //delete grade
                $table->where('id',$faq)->delete();
                return redirect()->back()->with('success','Grade Removed Successfully');
            }

            if($action == 'update'){
                //update grade & save
                $faq = $table->where('id',$faq)->first();

                return view('admin.faqs.create',compact('faq','categories'));
            }

        }


        if($action == 'create'){
            return view('admin.faqs.create',compact('categories'));
        }

        $faqs = $table->join('faqs_categories','faqs_categories.id','=','faqs.faq_cat_id')->get();

        return view('admin.faqs.index',compact('faqs','categories'));

    }
}
