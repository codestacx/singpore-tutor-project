<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function testing(Request $request){


        return Helper::loadMusicExperienceCard();
    }
}
