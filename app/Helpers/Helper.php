<?php


namespace App\Helpers;


use App\Models\Citizenship;
use App\Models\Qualification;
use App\Models\Race;
use App\Models\SchoolType;
use Illuminate\Support\Str;

class Helper {


    public static function loadCard($atts = null){
        $schooltypes    = SchoolType::all();
        ob_start();

        $cardid = is_null($atts) ? Str::random():$atts['cardid'];
        $parent = is_null($atts) ? Str::random():$atts['parent'];


        ?>


        <div class="card">
            <div class="card-header" id="<?=$cardid?>">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="<?='#'.$parent?>" aria-expanded="true" aria-controls="<?=$parent?>">
                        Collapsible Group Item #1
                    </button>
                </h2>
            </div>

            <div id="<?=$parent?>" class="collapse show" aria-labelledby="<?=$cardid?>">
                <div class="card-body">
                    <input type="text" />
                </div>
            </div>
        </div>



        <?php
        return ob_get_clean();
    }

    public static function testing(){
        $parent='';
        $cardid='';
        ?>
        <div class="accordion" id="accordian">

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
                                    <select class="custom-select custom-select-sm" name="level_type" onchange="commonServer.onChangeSchoolLevel(this,'<?=$parent?>')" id="level_type">
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
                                    <input type="text" class="form-control" style="height: 30px" name="school_name" id="school_name"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">



                            <div class="form-row col-sm-6 col-lg-6 col-md-6">
                                <div class="col">
                                    <label for="level_type">Start Month</label>
                                    <select class="custom-select custom-select-sm" name="level_type" id="level_type">
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
                                    <select class="custom-select custom-select-sm" name="level_type" id="level_type">
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
                                    <select class="custom-select custom-select-sm" name="level_type" id="level_type">
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
                                    <select class="custom-select custom-select-sm" name="level_type" id="level_type">
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

                            <caption class="caption"><a href="javascript:;"><span><i class="fa fa-plus" style="color: #2cdd9b;cursor: pointer;" onclick="commonServer.addSubjectAndGrade('<?=$parent?>')"></i> Add Another  </span></a> </caption>

                            <tbody id="subject_grade_tbody">

                            <tr>

                                <h5 style="color: coral;font-family: fantasy;margin-top: 20px;" >Add Subject & Grade </h5>

                            </tr>

                            <tr>

                                <td>

                                    <input type="text" style="" placeholder="Subject" name="subject[]" class="form-control">

                                </td>

                                <td>

                                    <input type="text" style="" placeholder="Grade" name="grade[]" class="form-control">

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
                       <thead >
                       <caption class="caption"><a href="javascript:;"><span><i class="fa fa-plus" style="color: #2cdd9b"></i> Add another Major or Minor </span></a> </caption>
                       <tr>
                           <h6 style="color: coral;font-family: fantasy;margin-top: 20px;">Course Name or Major Name *</h6>
                       </tr>
                       <tr>
                           <th>
                               <input type="text" style="height: 30px;border-top: none;border-right: none;border-left: none;" placeholder="Course/Major Title" name="course_name[]" class="form-control">
                           </th>
                           <th>
                               <span> <i class="fa fa-trash" style="color: #b21f2d;cursor: pointer"></i> </span>
                           </th>
                       </tr>
                       </thead>

                    </table>
                    </span>


                        <div class="row">
                            <div class="form-group col-12">
                                <label for="achievments"><strong>Achievements e.g.</strong> <small>Final GPA, Book Prize, Honours attained, Dean's List, etc.</small></label>
                                <textarea class="form-control" placeholder="Achievements .." name="achievements" id="achievements"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
}
