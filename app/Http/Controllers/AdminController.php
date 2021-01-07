<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function welcome(Request $request){
        return view('admin.welcome');
    }
    public function levels(Request $request, $action = null, $level = null){

        $table = DB::table('levels');
        if($action == 'create'){
            return view('admin.levels.create');
        }
        if($action == 'delete'){
            //delete grade
            $table->where('id',$request->input('level'))->delete();
            return redirect()->back()->with('success','Level Removed Successfully');
        }
        if($action == 'update'){
            //update grade & save
            $level_edit = $table->where('id',$request->input('level'))->first();

            return view('admin.levels.create',compact('level_edit'));
        }


        if($request->method() == 'POST'){

            $formData = [
                    'level_title'           =>  $request->input('title'),
                    'active'                =>  ($request->input('is_active')!=""?1:0),
                    'created_at'            => Carbon::now()->toDateTimeString(),
                    'updated_at'            => Carbon::now()->toDateTimeString()
            ];

            if(isset($request->level_id)){
                $table->where('id',$request->input('level_id'))->update($formData);
              return redirect()->route('admin.levels')->with('success','Level updated Successfully');
            }

              DB::table('levels')->insert($formData);
              return redirect()->route('admin.levels')->with('success','Level add successfully');
        }

        $levels = DB::table('levels')->get();
        return view('admin.levels.index',compact('levels'));

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
}
