<?php


namespace App\Helpers;


use App\Models\Citizenship;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Location;
use App\Models\Preference;
use App\Models\Qualification;
use App\Models\Race;
use App\Models\SchoolType;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

class Helper {


    public static function prepareTutorRequestRow(){
        $levels = Level::with('grades')->get();

        ob_start();

        ?>
        <div class="form-group">
            <select class="form-control" name="level_grade[grades][]">
                <?php foreach($levels as $level):?>
                    <option value="" style="color: #00d69f" disabled><h5 style="color: #00d69f"><?=$level->level_title?></h5></option>
                    <?php foreach($level->grades as $grade):?>
                        <option value="<?=$grade->grade_id?>"><?=$grade->grade_title?></option>
                    <?php endforeach;?>
                <?php endforeach;?>
            </select>
        </div>
        <?php

        return ob_get_clean();
    }

    public static function loadCard($atts = null){


        $schooltypes    = SchoolType::all();
        ob_start();

        $cardid = is_null($atts) ? Str::random():$atts['cardid'];
        $parent = is_null($atts) ? Str::random():$atts['parent'];

        $input_index = is_null($atts) ?   0:$atts['index'];


        ?>


        <div class="card" id="<?=$parent ?>">
            <div style="margin: 10px;border-radius: 30px;"  class="card-header bg-info text-white">
                <span><i onclick="commonServer.removeCollapseSection('<?=$parent ?>')" style="cursor: pointer" class="fa fa-times float-right"></i> </span>
                <a class="text-white" href="javascript:;" data-parent="accordian" data-toggle="collapse" data-target="<?='#'.$cardid ?>" aria-expanded="false" aria-controls="<?=$cardid ?>">
                    <span class="card-title">
                    <span>
                        <i class="fa fa-diamond" style="color: cornsilk"></i>
                    </span> School/Course
                    </span>
                </a>
            </div>
            <div id="<?=$cardid ?>" class="panel-collapse collapse">
                <div class="card-body">

                    <div class="row">


                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="level_type">School Level</label>
                                <select class="custom-select custom-select-sm" name="school_level[]" onchange="commonServer.onChangeSchoolLevel(this,'<?=$parent?>')" id="level_type">
                                    <?php
                                    foreach ($schooltypes as $school){
                                        ?>
                                        <option value="<?=$school->id?>"><?=$school->type?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6">

                            <div class="form-group">
                                <label for="school_name">School Name</label> <br/>
                                <input type="text" class="form-control" style="height: 30px" name="school_name[]" id="school_name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">



                        <div class="form-row col-sm-6 col-lg-6 col-md-6">
                            <div class="col">
                                <label for="level_type">Start Month</label>
                                <select class="custom-select custom-select-sm" name="start_month[]" id="level_type">
                                    <option>- Month -</option>
                                    <option value="January">January</option>
                                    <option value="Febuary">Febuary</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="level_type">Start Year</label>
                                <select class="custom-select custom-select-sm" name="start_year[]" id="level_type">
                                    <?php
                                    $year = 2020;
                                    for(;$year > 1960; $year--){
                                        ?>
                                        <option value="<?=$year?>"><?=$year?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row col-sm-6 col-lg-6 col-md-6">
                            <div class="col">
                                <label for="level_type">End Month</label>
                                <select class="custom-select custom-select-sm" name="end_month[]" id="level_type">
                                    <option>- Month -</option>
                                    <option value="January">January</option>
                                    <option value="Febuary">Febuary</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="level_type">End Year</label>
                                <select class="custom-select custom-select-sm" name="end_year[]" id="level_type">
                                    <?php
                                    $year = 2020;
                                    for(;$year > 1960; $year--){
                                        ?>
                                        <option value="<?=$year?>"><?=$year?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <span id="table_subjectgrade">
                        <table class="table table-borderless">

                            <caption class="caption"><a href="javascript:;"><span><i class="fa fa-plus" style="color: #2cdd9b;cursor: pointer;" onclick="commonServer.addSubjectAndGrade('<?=$parent?>',<?=$input_index?>)"></i> Add Another  </span></a> </caption>

                            <tbody id="subject_grade_tbody">

                            <tr>

                                <h5 style="color: coral;font-family: fantasy;margin-top: 20px;" >Add Subject & Grade </h5>

                            </tr>

                            <tr>

                                <td>

                                    <input type="text" style="" placeholder="Subject" name="subject[<?=$input_index?>][]" class="form-control">

                                </td>

                                <td>
                                    <input type="text" style="" placeholder="Grade" name="grade[<?=$input_index?>][]" class="form-control">

                                </td>

                                <td>

                                    <span onclick="commonServer.removeSubjectAndGradeRow(this)"> <i class="fa fa-trash"   style="color: #b21f2d;cursor: pointer"></i> </span>

                                </td>

                            </tr>
                      </tbody>
                    </table>
                   </span>

                    <span id="course_major_table" style="display: none">
                        <table class="table table-borderless" >
                            <thead>
                              <caption class="caption"><a onclick="commonServer.addCourseMajor('<?="course_major_table_tbody".$cardid?>',<?=$input_index?>)" href="javascript:;"><span><i class="fa fa-plus" style="color: #2cdd9b"></i> Add another Major or Minor </span></a> </caption>

                             <td>
                           <h6 style="color: coral;font-family: fantasy;margin-top: 20px;">Course Name or Major Name *</h6>
                       </td>
                            </thead>
                       <tbody class="course_major_table_tbody" id="<?="course_major_table_tbody".$cardid?>">


                       <tr>
                           <td>
                               <input type="text"  placeholder="Course/Major Title" name="course_name[<?=$input_index?>][]" class="form-control" style="height: 30px;border-top: none;border-right: none;border-left: none">
                           </td>
                           <td>
                               <span onclick="this.parentNode.parentNode.remove()"> <i  class="fa fa-trash" style="color: #b21f2d;cursor: pointer"></i> </span>
                           </td>
                       </tr>
                       </tbody>

                    </table>
                    </span>


                    <div class="row">
                        <div class="form-group col-12">
                            <label for="achievments"><strong>Achievements e.g.</strong> <small>Final GPA, Book Prize, Honours attained, Dean's List, etc.</small></label>
                            <textarea class="form-control" placeholder="Achievements .." name="achievements[]" id="achievements"></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?php
        return ob_get_clean();
    }

    public static function preparedCard($data,$input_index){

        $parent = Str::random();
        $cardid = Str::random(34);
        $schooltypes    = SchoolType::all();
        ob_start();
        ?>
        <div class="card" id="<?=$parent ?>">
            <div style="margin: 10px;border-radius: 30px;"  class="card-header bg-info text-white">
                <span><i onclick="commonServer.removeCollapseSection('<?=$parent ?>')" style="cursor: pointer" class="fa fa-times float-right"></i> </span>
                <a class="text-white" href="javascript:;" data-parent="accordian" data-toggle="collapse" data-target="<?='#'.$cardid ?>" aria-expanded="false" aria-controls="<?=$cardid ?>">
                    <span class="card-title">
                    <span>
                        <i class="fa fa-diamond" style="color: cornsilk"></i>
                    </span> School/Course
                    </span>
                </a>
            </div>
            <div id="<?=$cardid ?>" class="panel-collapse collapse">
                <div class="card-body">

                    <div class="row">


                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="level_type">School Level</label>
                                <select class="custom-select custom-select-sm" name="school_level[]" onchange="commonServer.onChangeSchoolLevel(this,'<?=$parent?>')" id="level_type">
                                    <?php
                                    foreach ($schooltypes as $school){
                                        ?>
                                        <option <?php echo $school->id == $data->school_level ? 'selected':'' ?>  value="<?=$school->id?>"><?=$school->type?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6">

                            <div class="form-group">
                                <label for="school_name">School Name</label> <br/>
                                <input type="text" value="<?=$data->school_name?>" class="form-control" style="height: 30px" name="school_name[]" id="school_name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">



                        <div class="form-row col-sm-6 col-lg-6 col-md-6">
                            <div class="col">
                                <label for="level_type">Start Month</label>
                                <select class="custom-select custom-select-sm" name="start_month[]" id="level_type">
                                    <option selected value="<?=$data->start_month?>"><?=$data->start_month?></option>

                                    <option value="January">January</option>
                                    <option value="Febuary">Febuary</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="level_type">Start Year</label>
                                <select class="custom-select custom-select-sm" name="start_year[]" id="level_type">
                                    <?php
                                    $year = 2020;
                                    for(;$year > 1960; $year--){
                                        ?>
                                        <option <?php echo $year == $data->start_year ? 'selected':'' ?>  value="<?=$year?>"><?=$year?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row col-sm-6 col-lg-6 col-md-6">
                            <div class="col">
                                <label for="level_type">End Month</label>
                                <select class="custom-select custom-select-sm" name="end_month[]" id="level_type">
                                    <option selected value="<?=$data->end_month?>"><?=$data->end_month?></option>

                                    <option value="January">January</option>
                                    <option value="Febuary">Febuary</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="level_type">End Year</label>
                                <select class="custom-select custom-select-sm" name="end_year[]" id="level_type">
                                    <?php
                                    $year = 2020;
                                    for(;$year > 1960; $year--){
                                        ?>
                                        <option <?php echo $year == $data->end_year ? 'selected':'' ?>  value="<?=$year?>"><?=$year?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <span id="table_subjectgrade">
                        <table class="table table-borderless">

                            <caption class="caption"><a href="javascript:;"><span><i class="fa fa-plus" style="color: #2cdd9b;cursor: pointer;" onclick="commonServer.addSubjectAndGrade('<?=$parent?>',<?=$input_index?>)"></i> Add Another  </span></a> </caption>

                            <tbody id="subject_grade_tbody">

                            <tr>

                                <h5 style="color: coral;font-family: fantasy;margin-top: 20px;" >Add Subject & Grade </h5>

                            </tr>

                            <?php if(!in_array($data->school_level,[6,7,8])): ?>

                            <?php foreach (json_decode($data->subjects_and_grades) as $sub): ?>
                            <tr>

                                <td>

                                    <input type="text" style="" value="<?=$sub->subject?>" placeholder="Subject" name="subject[<?=$input_index?>][]" class="form-control">

                                </td>

                                <td>
                                    <input type="text" style="" value="<?=$sub->grade?>" placeholder="Grade" name="grade[<?=$input_index?>][]" class="form-control">

                                </td>

                                <td>

                                    <span onclick="commonServer.removeSubjectAndGradeRow(this)"> <i class="fa fa-trash"   style="color: #b21f2d;cursor: pointer"></i> </span>

                                </td>

                            </tr>
                                <?php endforeach;?>

                            <?php endif; ?>
                      </tbody>
                    </table>
                   </span>

                    <span id="course_major_table" style="display: <?=  in_array($data->school_level,[6,7,8]) ? '':'none'?>">
                        <table class="table table-borderless" >
                            <thead>
                              <caption class="caption"><a onclick="commonServer.addCourseMajor('<?="course_major_table_tbody".$cardid?>')" href="javascript:;"><span><i class="fa fa-plus" style="color: #2cdd9b"></i> Add another Major or Minor </span></a> </caption>

                             <td>
                           <h6 style="color: coral;font-family: fantasy;margin-top: 20px;">Course Name or Major Name *</h6>
                       </td>
                            </thead>
                       <tbody class="course_major_table_tbody" id="<?="course_major_table_tbody".$cardid?>">

                            <?php if(in_array($data->school_level,[6,7,8])):?>
                                <?php foreach (json_decode($data->subjects_or_majors) as $sub): ?>
                                    <tr>
                                                       <td>
                                                           <input type="text" value="<?=$sub?>"  placeholder="Course/Major Title" name="course_name[<?=$input_index?>][]" class="form-control" style="height: 30px;border-top: none;border-right: none;border-left: none">
                                                       </td>
                                                       <td>
                                                           <span onclick="this.parentNode.parentNode.remove()"> <i  class="fa fa-trash" style="color: #b21f2d;cursor: pointer"></i> </span>
                                                       </td>
                                                   </tr>
                                <?php endforeach;?>

                            <?php endif;?>

                       </tbody>

                    </table>
                    </span>


                    <div class="row">
                        <div class="form-group col-12">
                            <label for="achievments"><strong>Achievements e.g.</strong> <small>Final GPA, Book Prize, Honours attained, Dean's List, etc.</small></label>
                            <textarea class="form-control" placeholder="Achievements .." name="achievements[]" id="achievements"><?php echo $data->achievements;?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?php
        return ob_get_clean();

    }

    public static function loadExperienceCard(){

        $levels = Level::all();

        $data_levels = array_map(function($level){
            return (object)[
                'level_id'=>$level['id'],'level_title'=>$level['level_title']
            ];
        },$levels->toArray());

        $subjects = Subject::all();
        ob_start();
        ?>

        <div class="col-12 col-lg-12" >
            <div class="form-group col-md-10 col-lg-10">
                <label for="is_taught">Have you taught in an MOE school before?</label>
                <select onchange="commonServer.toggleExperienceForm(this)" class="custom-select custom-select-sm" name="is_taught_in_moe" id="is_taught">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>


        <div class="row" id="moe_school_experience">
            <div class="col-12 col-lg-12">
                <div class="form-group col-md-6 col-lg-6 col-sm-12" style="margin-left: 10px">
                    <br/>
                    <h6 style="margin-left: 10px;color: cadetblue;font-family: Sans;"> Your MOE School Teaching Experience </h6>
                    <label >
                        Number of years teaching in MOE schools ?
                    </label>
                    <input type="text" class="form-control" style="height: 30px" name="moe_number_experience" placeholder="Years"/>
                </div>
            </div>
            <div class="row">
                <table class="table table-borderless" id="moe_school_teaching_experience_table">
                    <thead>
                    <caption > <a class="moe-experience-add-more" href="javascript:;" onclick="Experience.addAnotherMoeExperienceLevelRow('moe_school_teaching_experience_table')"> <i class="fa fa-plus"></i> Add More </a> </caption>
                    <tr>
                        <th>Level</th>
                        <th>Subject</th>
                        <th>School</th>
                        <th>Years Taught</th>
                        <th>Last Taught</th>
                        <th style="color: #b21f2d">Trash</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select name="level[]" id="" class="custom-select custom-select-sm">
                              <?php foreach($levels as $level):?>
                                <option value="<?php echo $level->id?>"><?=$level->level_title?></option>

                                <?php endforeach;?>
                            </select>
                        </td>

                        <td>
                            <select name="subjects[0][]"  class="selectpicker show-menu-arrow" multiple >
                                <?php foreach($subjects as $subject):?>
                                    <option value="<?=$subject->subject_id?>"><?=$subject->subject_title?></option>
                                <?php endforeach;?>
                            </select>
                        </td>

                        <td>
                            <input type="text"  class="form-control" name="school[]" id="" />
                        </td>

                        <td>
                            <input type="text" class="form-control" name="years_taught[]" id="" />
                        </td>


                        <td>
                            <input type="text" class="form-control" name="last_taught[]" id="" />
                        </td>
                        <td>
                            <i class="fa fa-trash" style="cursor:pointer;color: #b21f2d" onclick="this.parentNode.parentNode.remove()"></i>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-12 col-lg-12">
            <div class="form-group col-md-6 col-lg-6 col-sm-12" style="margin-left: 10px">
                <br/>
                <h6 style="margin-left: 10px;color: cadetblue;font-family: Sans;"> Your Private School Teaching Experience </h6>
                <label >
                    Number of years teaching in Private schools ?
                </label>
                <input type="text" name="private_number_experience" class="form-control" style="height: 30px" placeholder="Years"/>
            </div>
        </div>

        <div class="row">
            <table class="table table-borderless" id="private_school_teaching_experience_table">
                <thead>
                <caption> <a class="private-experience-add-more" href="javascript:;" onclick="Experience.addAnotherPrivateExperienceLevelRow('private_school_teaching_experience_table')"> <i class="fa fa-plus"></i> Add More </a> </caption>
                <tr>
                    <th>Level</th>
                    <th>Subject</th>
                    <th>School</th>
                    <th>Years Taught</th>
                    <th>Last Taught</th>
                    <th  style="color: #b21f2d">Trash</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select name="private_level[]" id="" class="custom-select custom-select-sm">
                            <?php foreach($levels as $level):?>
                                <option value="<?php echo $level->id?>"><?=$level->level_title?></option>

                            <?php endforeach;?>
                        </select>
                    </td>

                    <td>
                        <select name="private_subjects[0][]"  class="selectpicker show-menu-arrow" multiple >
                            <?php foreach($subjects as $subject):?>
                                <option value="<?=$subject->subject_id?>"><?=$subject->subject_title?></option>
                            <?php endforeach;?>
                        </select>
                    </td>

                    <td>
                        <input type="text"  class="form-control" name="private_school[]" id="" />
                    </td>

                    <td>
                        <input type="text" class="form-control" name="private_years_taught[]" id="" />
                    </td>


                    <td>
                        <input type="text" class="form-control" name="private_last_taught[]" id="" />
                    </td>
                    <td>
                        <i class="fa fa-trash" style="cursor:pointer;color: #b21f2d" onclick="this.parentNode.parentNode.remove()"></i>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="row">
            <label style="margin-left: 10px;color: deepskyblue"> Students you have taught - <code>check all that applies</code></label>
            <div class="col-sm-12 col-lg-12 col-md-12">



                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="ib" value="IB" name="students_taught[]">
                    <label class="form-check-label" for="ib">IB</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="igcse" value="IGCSE"  name="students_taught[]">
                    <label class="form-check-label" for="igcse">IGCSE</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="moe_gifted" value="MOE Gifted Programme" name="students_taught[]">
                    <label class="form-check-label" for="moe_gifted"> MOE Gifted Programme</label>
                </div>


                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="with_adhd" value="With ADHD" name="students_taught[]">
                    <label class="form-check-label" for="with_adhd">With ADHD</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Autistic" value="Autistic" name="students_taught[]">
                    <label class="form-check-label" for="Autistic">Autistic</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Dyslexic" value="Dyslexic" name="students_taught[]">
                    <label class="form-check-label" for="Dyslexic"> Dyslexic</label>
                </div>

            </div>
        </div>





        <?php
        echo ob_get_clean();
    }


    public static function loadMusicExperienceCard(){
        ob_start();
        ?>


            <div class="row">
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label>
                        Are you a Full Time Music Teacher?
                    </label>
                    <select class="custom-select custom-select-sm" name="is_fulltime_music_teacher">
                        <option value="1"> Yes </option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label>Your Theory Level ?</label>
                    <input style="height: 30px" type="text" class="form-control" name="thoery_level" placeholder="Theory Level" />
                </div>
            </div>


        <hr/>
          <div class="row">
              <section class="col-sm-12 col-lg-12 col-md-12">

                  <h6 style="color:teal"> Your Proficiency of Music Instruments </h6>

                  <table class="table table-borderless" id="music_experience_table">
                      <thead>
                      <tr>
                          <th>
                              No. Instrument *
                          </th>
                          <th>
                              Practical Level *
                          </th>
                          <th>
                              Achievements
                          </th>
                      </tr>

                      </thead>

                      <tbody>
                      <tr>
                          <td>
                              <select name="instrument[]" class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                                  <option value="0">Flute</option>
                                  <option value="1">Guitar</option>
                              </select>
                          </td>

                          <td> <input name="practical_level[]" type="text" src="" class="form-control" /> </td>
                          <td> <textarea name="achievements[]" style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>
                      <tr>
                          <td>
                              <select name="instrument[]" class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                                  <option value="0">Flute</option>
                                  <option value="1">Guitar</option>
                              </select>
                          </td>

                          <td> <input name="practical_level[]" type="text" src="" class="form-control" /> </td>
                          <td> <textarea name="achievements[]" style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>
                      <tr>
                          <td>
                              <select name="instrument[]" class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                                  <option value="0">Flute</option>
                                  <option value="1">Guitar</option>
                              </select>
                          </td>

                          <td> <input name="practical_level[]" type="text" src="" class="form-control" /> </td>
                          <td> <textarea name="achievements[]" style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>



                      </tbody>
                  </table>


                  <div class="row">
                      <div class="col-12">
                          <label>Play other music instruments? <code>Please give details here:</code></label>
                          <textarea name="other_music_details" style="" class="form-control"></textarea>
                      </div>
                      <hr/>
                  </div>


                  <br/>
                  <h6>Your Teaching History</h6> <br/>
                  <div class="row">


                      <div class="form-group col-sm-12 col-md-6 col-lg-6">
                          <label> Number of years teaching music? </label>
                          <input name="no_of_years_experience" type="tel" class="form-control" placeholder="e.g 10"/>
                      </div>
                  </div>


                  <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>
                              Taught in a School ?
                          </label>
                          <select name="is_taught_in_school"  class="custom-select custom-select-sm">
                              <option value="1"> Yes </option>
                              <option value="0">No</option>
                          </select>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>Please give details here:</label>
                          <textarea name="taught_in_school_details" style="resize: none;height: 40px" class="form-control" placeholder=""></textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>
                              Taught private lessons?
                          </label>
                          <select name="is_taught_in_private" class="custom-select custom-select-sm">
                              <option value="1"> Yes </option>
                              <option value="0">No</option>
                          </select>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>Please give details here:</label>
                          <textarea name="taught_in_private_details" style="resize: none;height: 40px" class="form-control" placeholder=""></textarea>
                      </div>
                  </div>
              </section>
          </div>



        <?php


        echo ob_get_clean();
    }



    public static function loadPreferencePage(){
       $locations = Location::with('places')->get();
       $primary_grades = Grade::where(['level_id'=>1])->get();
       $secondary_grades = Grade::where(['level_id'=>2])->get();
       $jc_grades = Grade::where(['level_id'=>3])->get();
       $others_grades = Grade::where(['level_id'=>4])->get();
       $subjects = Subject::all();

       //$preference = Preference::where()->first();

       ob_start();

        ?>
        <h6> I am available to take tuition at...  <code>*</code></h6>
        <script>
             function toggleTutorHomeInfoSection(){
                 var e = document.getElementById('my_home_information');
                 if(e.style.display === 'none'){
                     e.style.display = '';
                 }else{
                     e.style.display = 'none';
                 }

             }
        </script>
        <div class="row">
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="availability_at_student_home" type="checkbox" id="student_house" value="1">
                <label class="form-check-label" for="student_house">Student House</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" onchange="toggleTutorHomeInfoSection()" name="availability_at_tutor_home" type="checkbox" id="own_house" value="1">
                <label class="form-check-label"  for="own_house">My Own House or Centre</label>
            </div>
        </div>


        <hr/>
        <div class="row" style="display: none" id="my_home_information">

            <div class="col-sm-12 col-md-6 col-lg-6">
                <label>My Postal Code</label>

                <input type="text" class="form-control" name="tutor_home_postal" placeholder="Enter location postal code" style="height: 30px"/>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <label>What can students expect for classes at my location:</label>
                <textarea name="class_criteria" class="form-control"></textarea>
                <small>e.g. Group size? Material cost? Are trial lessons free/chargeable? Classroom with whiteboard? etc</small>
            </div>
        </div>

        <hr/>


        <span> I would like to teach in these locations... * </span>

        <div class="row">
            <?php foreach($locations as $location):?>
            <div class="form-group col-sm-12 col-md-8 col-lg-8">
               <span style="font-size: 16px;font-weight: normal;margin:10px;"> <b style="font-size: 16px;margin:10px;"><?php echo $location->location_title ?></b></span>
               <?php foreach ($location->places as $place):?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="location[]"  value="<?=$place->id?>" id="check1">
                    <label class="form-check-label" for="check1">
                       <?php echo $place->place ?>
                    </label>
                </div>
                <?php endforeach;?>

            </div>

            <?php endforeach;?>
        </div>



        <hr/>

        <div  style="margin: 10px">
            <span> I would like to teach these levels and subjects </span>
        </div>


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <br/>
            <li class="nav-item">
                <a class="nav-link active" id="primary-tab" data-toggle="tab" href="#primary" role="tab" aria-controls="primary" aria-selected="true">Primary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="secondary-tab" data-toggle="tab" href="#secondary" role="tab" aria-controls="secondary" aria-selected="false">Secondary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="jc-tab" data-toggle="tab" href="#jc" role="tab" aria-controls="jc" aria-selected="false">JC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="others-tab" data-toggle="tab" href="#others" role="tab" aria-controls="others" aria-selected="false">Others & Foreign Languages</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="primary" role="tabpanel" aria-labelledby="primary-tab">
                <div class="row">

                    <?php foreach($primary_grades as $grade):?>
                        <div class="col">
                            <br/>
                            <span style="font-size: 16px; margin:5px;"><?=$grade->grade_title?></span>
                            <hr/>
                            <?php foreach($subjects as $subject):?>
                            <?php
                                $name = str_replace(' ','',$grade->grade_title);
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="levels[<?='grade_'.$grade->grade_id.'_'.$grade->level_id?>][]" value="<?=$subject->subject_id?>" id="">
                                    <label class="form-check-label" for="check1">
                                        <?php echo $subject->subject_title ?>
                                    </label>
                                </div>

                            <?php endforeach;?>

                        </div>
                    <?php endforeach;?>

                </div>

            </div>
            <div class="tab-pane fade" id="secondary" role="tabpanel" aria-labelledby="secondary-tab">
              <div class="row">
                  <?php foreach($secondary_grades as $grade):?>
                      <div class="col">
                          <br/>
                          <span style="font-size: 16px; margin:5px;"><?=$grade->grade_title?></span>
                          <hr/>
                          <?php foreach($subjects as $subject):?>
                              <?php
                              $name = str_replace(' ','',$grade->grade_title);
                              ?>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="levels[<?='grade_'.$grade->grade_id.'_'.$grade->level_id?>][]" value="<?=$subject->subject_id?>" id="">
                                  <label class="form-check-label" for="check1">
                                      <?php echo $subject->subject_title ?>
                                  </label>
                              </div>

                          <?php endforeach;?>

                      </div>
                  <?php endforeach;?>
              </div>
            </div>
            <div class="tab-pane fade" id="jc" role="tabpanel" aria-labelledby="jc-tab">
              <div class="row">
                  <?php foreach($jc_grades as $grade):?>
                      <div class="col">
                          <br/>
                          <span style="font-size: 16px; margin:5px;"><?=$grade->grade_title?></span>
                          <hr/>
                          <?php foreach($subjects as $subject):?>
                              <?php
                              $name = str_replace(' ','',$grade->grade_title);
                              ?>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="levels[<?='grade_'.$grade->grade_id.'_'.$grade->level_id?>][]" value="<?=$subject->subject_id?>" id="">
                                  <label class="form-check-label" for="check1">
                                      <?php echo $subject->subject_title ?>
                                  </label>
                              </div>

                          <?php endforeach;?>

                      </div>
                  <?php endforeach;?>
              </div>
            </div>
            <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tab">
                <div class="row">
                    <?php foreach($others_grades as $grade):?>
                        <div class="col">
                            <br/>
                            <span style="font-size: 16px; margin:5px;"><?=$grade->grade_title?></span>
                            <hr/>
                            <?php foreach($subjects as $subject):?>
                                <?php
                                $name = str_replace(' ','',$grade->grade_title);
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="levels[<?='grade_'.$grade->grade_id.'_'.$grade->level_id?>][]" value="<?=$subject->subject_id?>" id="">
                                    <label class="form-check-label" for="check1">
                                        <?php echo $subject->subject_title ?>
                                    </label>
                                </div>

                            <?php endforeach;?>

                        </div>
                    <?php endforeach;?>
                </div>
            </div>

        </div>

        <hr/>
        <br/>

        <div class="row">
          <div>
              <h6> I charge these hourly rates...</h6>
              <small>Leave this section blank if you're open to quotes.</small>
          </div>

            <div class="col-sm-12 col-md-10 col-lg-10">
                <table class="table " id="rates_per_hour_table">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th>Level</th>
                        <th>Rate/hr</th>
                    </tr>

                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td>Lower Primary</td>
                        <td><input type="text" name="lower_primary_rate" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td>Upper Primary</td>
                        <td><input type="text" name="upper_primary_rate" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td>Lower Secondary</td>
                        <td><input type="text" name="lower_secondary_rate" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td> 4 </td>
                        <td>Uper Secondary</td>
                        <td><input type="text" name="uper_secondary_rate" class="form-control"/></td>
                    </tr>

                    <tr>
                        <td> 5 </td>
                        <td>JC</td>
                        <td><input type="text" name="jc_rate" class="form-control"/></td>
                    </tr>

                    </tbody>
                    </thead>
                </table>
            </div>
        </div>



        <hr/>
        <div class="row">
            <div class="form-group">
                <label>
                    Please provide a short description about yourself, to differentiate yourself from the other tutors. *
                   <br/>
                    <code>
                        <small>
                            E.g. your strong points and qualities (e.g. teaching style, track record), anything else that can help us recommend you to the parent.

                        </small>

                    </code> </label>
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>
        <?php

        echo ob_get_clean();
    }


    public static function loadDocumentPage(){

        ob_start();
        ?>

        <div class="row" style="margin: 10px;padding: 15px">

            <span style="color: orangered"><i class="fa fa-star"></i>  &nbsp; All documents are for internal use only & are not released to clients, except recent photo.</span>
            <br/>
            <span>  <i class="fa fa-star"></i>  &nbsp;  Please provide the following for verification check.</span>
            <span style="color: #00d69f"> <i class="fa fa-star"></i>  &nbsp;  Verified tutors will have priority in assignments. Please cover your NRIC number, for your own privacy.</span>

        </div>



        <div class="row " style="margin: 20px">
            <div>
                <h6> Academic Certificates </h6>
            </div>
            <table class="table table-striped" id="academic_certificates_table">
                <tbody>
                <tr>
                    <td>
                        <input type="file" name="certificates[]" class="form-control"/>
                    </td>
                    <td>
                        Empty
                    </td>
                    <td>
                         <i onclick="this.parentNode.parentNode.remove()" class="fa fa-trash" style="color: #b21f2d;cursor:pointer;"></i>
                    </td>

                    <td>
                        <span> <i onclick="Document.addCerticateFieldRow('academic_certificates_table')" class="fa fa-plus" style="cursor: pointer;color: #00d69f"></i> </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div >
        <hr/>
        <div class="row " style="margin: 20px">
            <div>
                <h6> Proof of Citizenship</h6>
                <small>
                    Only Singapore citizens, PRs, Student Pass holders can be matched. Will be removed after verification.
                </small><br/>
                <code>
                    (Note: you can also show first 3 digits of NRIC in an official document)
                </code>
            </div>
            <table class="table table-striped" id="">
                <tbody>
                <tr>
                    <td>
                        <input type="file" name="proof_citizenship" class="form-control"/>
                    </td>


                </tr>
                </tbody>
            </table>
        </div>
        <hr/>
        <div class="row " style="margin: 20px">
            <div>
                <h6> Photo ID showing Photo & Name</h6>
                <small>
                    To confirm your identity. Will be removed after verification.
                </small><br/>
                <code>
                    (e.g. nric, driver's licence, student card, office pass, concession card, etc)
                </code>
            </div>
            <table class="table table-striped" id="">
                <tbody>
                <tr>
                    <td>
                        <input type="file" name="photo_id" class="form-control"/>
                    </td>


                </tr>
                </tbody>
            </table>
        </div >
        <hr/>
        <div class="row " style="margin: 20px">
            <div>
                <h6> Recent Photo</h6>
                <small>
                    Will be released to client after assignment is matched. Selfie is ok, so long as it's clear.
                </small>
            </div>
            <table class="table table-striped" id="">
                <tbody>
                <tr>
                    <td>
                        <input type="file" name="recent_photo" class="form-control"/>
                    </td>


                </tr>
                </tbody>
            </table>
        </div>
        <hr/>
        <div class="row " style="margin: 20px">
            <div>
                <h6> Any Additional Supported Documents </h6>
            </div>
            <table class="table table-striped" id="additional_documents_table">
                <tbody>
                <tr>
                    <td>
                        <input type="file" name="supported_documents[]" class="form-control"/>
                    </td>
                    <td>
                        Empty
                    </td>
                    <td>
                        <i onclick="this.parentNode.parentNode.remove()" class="fa fa-trash" style="color: #b21f2d;cursor:pointer;"></i>
                    </td>

                    <td>
                        <span> <i onclick="Document.addAdditionalDocumentRow('additional_documents_table')" class="fa fa-plus" style="cursor: pointer;color: #00d69f"></i> </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <?php
       echo  ob_get_clean();
    }
}
