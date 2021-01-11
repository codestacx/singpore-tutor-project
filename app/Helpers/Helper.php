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
                            <thead>
                              <caption class="caption"><a onclick="commonServer.addCourseMajor('<?="course_major_table_tbody".$cardid?>')" href="javascript:;"><span><i class="fa fa-plus" style="color: #2cdd9b"></i> Add another Major or Minor </span></a> </caption>

                             <td>
                           <h6 style="color: coral;font-family: fantasy;margin-top: 20px;">Course Name or Major Name *</h6>
                       </td>
                            </thead>
                       <tbody class="course_major_table_tbody" id="<?="course_major_table_tbody".$cardid?>">


                       <tr>
                           <td>
                               <input type="text"  placeholder="Course/Major Title" name="course_name[]" class="form-control" style="height: 30px;border-top: none;border-right: none;border-left: none">
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
                            <textarea class="form-control" placeholder="Achievements .." name="achievements" id="achievements"></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?php
        return ob_get_clean();
    }


    public static function loadExperienceCard(){

        ob_start();
        ?>

        <div class="col-12 col-lg-12" >
            <div class="form-group col-md-10 col-lg-10">
                <label for="is_taught">Have you taught in an MOE school before?</label>
                <select class="custom-select custom-select-sm" name="is_taught" id="is_taught">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>


        <div class="col-12 col-lg-12">
            <div class="form-group col-md-6 col-lg-6 col-sm-12" style="margin-left: 10px">
                <br/>
                <h6 style="margin-left: 10px;color: cadetblue;font-family: Sans;"> Your MOE School Teaching Experience </h6>
                <label >
                    Number of years teaching in MOE schools ?
                </label>
                <input type="text" class="form-control" style="height: 30px" placeholder="Years"/>
            </div>
        </div>


        <div class="row">
            <table class="table table-borderless" id="moe_school_teaching_experience_table">
                <thead>
                <caption> <a class="moe-experience-add-more" href="javascript:;" onclick="Experience.addAnotherMoeExperienceLevelRow('moe_school_teaching_experience_table')"> <i class="fa fa-plus"></i> Add More </a> </caption>
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
                            <select name="" id="" class="custom-select custom-select-sm">
                                <option disabled selected> Level</option>
                            </select>
                        </td>

                        <td>
                            <input type="text" class="form-control" name="Subject level to see Subjects"/>
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="" />
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="" />
                        </td>


                        <td>
                            <input type="text" class="form-control" name="" id="" />
                        </td>
                        <td>
                           <i class="fa fa-trash" style="cursor:pointer;color: #b21f2d" onclick="this.parentNode.parentNode.remove()"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="col-12 col-lg-12">
            <div class="form-group col-md-6 col-lg-6 col-sm-12" style="margin-left: 10px">
                <br/>
                <h6 style="margin-left: 10px;color: cadetblue;font-family: Sans;"> Your Private School Teaching Experience </h6>
                <label >
                    Number of years teaching in Private schools ?
                </label>
                <input type="text" class="form-control" style="height: 30px" placeholder="Years"/>
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
                        <select name="" id="" class="custom-select custom-select-sm">
                            <option disabled selected> Level</option>
                        </select>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="Subject level to see Subjects"/>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="" id="" />
                    </td>

                    <td>
                        <input type="text" class="form-control" name="" id="" />
                    </td>


                    <td>
                        <input type="text" class="form-control" name="" id="" />
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
                    <input class="form-check-input" type="checkbox" id="iptrack" value="option1">
                    <label class="form-check-label" for="iptrack">IP track</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="ib" value="option2">
                    <label class="form-check-label" for="ib">IB</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="igcse" value="option3" >
                    <label class="form-check-label" for="igcse">IGCSE</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="moe_gifted" value="option3" >
                    <label class="form-check-label" for="moe_gifted"> MOE Gifted Programme</label>
                </div>


                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="with_adhd" value="option2">
                    <label class="form-check-label" for="with_adhd">With ADHD</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Autistic" value="option3" >
                    <label class="form-check-label" for="Autistic">Autistic</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Dyslexic" value="option3" >
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
                    <select class="custom-select custom-select-sm">
                        <option value="Yes"> Yes </option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label>Your Theory Level ?</label>
                    <input style="height: 30px" type="text" class="form-control" placeholder="Theory Level" />
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
                              <select class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                              </select>
                          </td>

                          <td> <input type="text" src="" class="form-control" /> </td>
                          <td> <textarea style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>
                      <tr>
                          <td>
                              <select class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                              </select>
                          </td>

                          <td> <input type="text" class="form-control" /> </td>
                          <td> <textarea style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>
                      <tr>
                          <td>
                              <select class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                              </select>
                          </td>

                          <td> <input type="text" class="form-control" /> </td>
                          <td> <textarea style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>
                      <tr>
                          <td>
                              <select class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                              </select>
                          </td>

                          <td> <input type="text" class="form-control" /> </td>
                          <td> <textarea style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>
                      <tr>
                          <td>
                              <select class="custom-select custom-select-sm">
                                  <option selected disabled> Select instrument </option>
                              </select>
                          </td>

                          <td> <input type="text" class="form-control" /> </td>
                          <td> <textarea style="resize: none;height: 40px" class="form-control"></textarea> </td>
                      </tr>


                      </tbody>
                  </table>


                  <div class="row">
                      <div class="col-12">
                          <label>Play other music instruments? <code>Please give details here:</code></label>
                          <textarea style="" class="form-control"></textarea>
                      </div>
                      <hr/>
                  </div>


                  <br/>
                  <h6>Your Teaching History</h6> <br/>
                  <div class="row">


                      <div class="form-group col-sm-12 col-md-6 col-lg-6">
                          <label> Number of years teaching music? </label>
                          <input type="tel" class="form-control" placeholder="e.g 10"/>
                      </div>
                  </div>


                  <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>
                              Taught in a School ?
                          </label>
                          <select class="custom-select custom-select-sm">
                              <option value="Yes"> Yes </option>
                              <option value="No">No</option>
                          </select>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>Please give details here:</label>
                          <textarea style="resize: none;height: 40px" class="form-control" placeholder=""></textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>
                              Taught private lessons?
                          </label>
                          <select class="custom-select custom-select-sm">
                              <option value="Yes"> Yes </option>
                              <option value="No">No</option>
                          </select>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6">
                          <label>Please give details here:</label>
                          <textarea style="resize: none;height: 40px" class="form-control" placeholder=""></textarea>
                      </div>
                  </div>
              </section>
          </div>



        <?php


        echo ob_get_clean();
    }
}
