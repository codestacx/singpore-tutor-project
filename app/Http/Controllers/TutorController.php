<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Citizenship;
use App\Models\Qualification;
use App\Models\Race;
use App\Models\SchoolType;
use Illuminate\Http\Request;

class TutorController extends Controller
{


    public function loadCard(Request $request){
        $id = $request;
        return Helper::loadCard($id);
    }
    public function registerationForm(Request $request){

        $templateData = [
            'races'=>Race::all(),
            'citizenships'=>Citizenship::all(),
            'schooltypes'=>SchoolType::all(),
            'qualifications'=>Qualification::all()
        ];

        return view('tutor.update_info',$templateData);
    }
}
