<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use App\Models\Race;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function registerationForm(Request $request){

        $races = Race::all();
        $citizenships = Citizenship::all();
        return view('tutor.update_info',compact('races','citizenships'));
    }
}
