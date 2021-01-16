@extends('application.dashboard.layouts.app')
@section('title','Tutor | Educational Information')
<style>
    #subject_grade_tbody input {
        height: 30px;border-top: none;border-right: none;border-left: none;
    }
</style>
@section('content')

    <div class="col-lg-8 col-xl-9">
        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>Educational Information</h2>
            </div>
            <div class="sl-dashboardbox__content sl-manageTimeSlots">
                <form class="sl-manageTimeSlots__form sl-form">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12" style="text-align: center">
                                <h5 style="color: cadetblue;font-family: fantasy;padding: 5px 5px 1px 1px;text-align: center"> What status belongs you ? </h5>
                            </div>
                            <div class="col-lg-12" style="margin: auto;text-align: center">

                                <div class="form-check form-check-inline">
                                    <input autocomplete="off" class="form-check-input" checked type="radio" name="tutorrole" id="fulltimestudent"    value="Full Time Student">
                                    <label class="form-check-label" for="fulltimestudent">
                                        Full Time Student
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input autocomplete="off" class="form-check-input" type="radio" name="tutorrole" id="moeschoolteacher" <?php echo isset($education) && ($education->category == "MOE School Teacher") ? 'checked':'' ?> value="MOE School Teacher">
                                    <label class="form-check-label" for="moeschoolteacher">
                                        MOE School Teacher
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input autocomplete="off" class="form-check-input" type="radio" name="tutorrole" id="fulltimetutor" <?php echo isset($education) && ($education->category == "Full Time") ? 'checked':'' ?>  value="Full Time">
                                    <label class="form-check-label" for="fulltimetutor">
                                        Full Time Tutor
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input autocomplete="off" class="form-check-input" type="radio" name="tutorrole" id="parttimetutor" <?php echo isset($education) && ($education->category == "Part Time") ? 'checked':'' ?> value="Part Time">
                                    <label class="form-check-label" for="parttimetutor">
                                        Part Time Tutor
                                    </label>
                                </div>
                            </div>

                        </div>

                        <br/>
                       <div id="related_sections">
                           <div class="form-group " id="fulltimestudent">
                               <label>
                                   <select name="sub_category_students" id="sl-intervals" class="form-control sl-form-control">
                                       <option selected disabled hidden>Please Specify</option>
                                       @foreach($student_categories as $student)
                                           <option <?= isset($education) && ($education->category == "Full Time Student") &&   $education->sub_category == $student->student_categories_id ? 'selected':'' ?> value="{{$student->student_categories_id}}">{{$student->category}}</option>
                                       @endforeach
                                   </select>
                               </label>
                           </div>

                           <div class="sl-form__wrap" id="moeschoolteacher" style="display: none;margin-top:15px">
                               <div class="form-group form-group-half">
                                   <label data-provide="datepicker">
                                       <input type="text" id="sl-startdate" class="form-control sl-form-control" value="<?=isset($education) ? $education->moe_email:''?>" name="moe_email" placeholder="MOE/School Email Address ">
                                       <a href="javascript:void(0);" class="sl-calendarbtn sl-right-icon"></a>
                                   </label>
                               </div>
                               <div class="form-group form-group-half">
                                   <select name="sub_category_students" id="sl-intervals" class="form-control sl-form-control">
                                       <option selected disabled hidden>Please Specify</option>
                                       @foreach($moespecs as $spec)
                                           <option <?= isset($education) && ($education->category == "MOE School Teacher") &&   $education->sub_category == $student->student_categories_id ? 'selected':'' ?>  value="{{$spec->id}}">{{$spec->specification}}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>

                           <div   id="fulltimetutor" style="display: none"></div>

                           <div  id="parttimetutor" style="display: none"></div>

                       </div>
                        <div class="sl-form__wrap" >

                            <div class="form-group form-group-half">
                                <select name="sub_category_students" id="sl-intervals" class="form-control sl-form-control">
                                    <option selected disabled hidden>What's your highest qualification attained</option>
                                    @foreach($moespecs as $spec)
                                        <option <?= isset($education) && ($education->category == "MOE School Teacher") &&   $education->sub_category == $student->student_categories_id ? 'selected':'' ?>  value="{{$spec->id}}">{{$spec->specification}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group form-group-half">
                                <label>
                                    <select  name="is_nie_trained"  id="sl-intervals" class="form-control sl-form-control">
                                        <option selected disabled hidden>Are you NIE-trained ?</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </label>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>Service Days</h2>
            </div>
            <div id="accordion1" class="accordion">
                <div  class="sl-dashboardbox__content sl-servicedays">
                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#collapse1" aria-expanded="false">
                        <div class="d-flex">
                            <h6>Monday</h6>
                            <p class="sl-servicedays__title--hidden">(Unavailable)</p>
                        </div>
                        <div class="sl-servicedays__title--rightarea">
                            <div class="sl-btnaction">
                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapse1" class="collapse show" data-parent="#accordion1">
                        <div class="sl-servicedays__spaces">
                            <form class="sl-manageTimeSlots__form sl-form">
                                <fieldset>

                                    <div class="sl-form__wrap">
                                        <div class="form-group form-group-half">
                                            <label>
                                                <select id="sl-intervals" class="form-control sl-form-control" name="school_level">
                                                    <option selected disabled hidden>School Level</option>
                                                    @foreach($schooltypes as $school)
                                                        <option value="{{$school->id}}">{{$school->type}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <label data-provide="datepicker">
                                                <input  style="height:36px" type="text" id="sl-startdate" class="form-control sl-form-control" name="school_name" placeholder="School name">
                                                <a href="javascript:void(0);" class="sl-calendarbtn sl-right-icon"></a>
                                            </label>
                                        </div>

                                        <div class="form-group form-group-half ">
                                            <label>
                                                <select name="start_month" id="sl-intervals" class="form-control sl-form-control">
                                                    <option selected disabled hidden>Start Month</option>
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
                                            </label>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <label>
                                                <select id="sl-intervals" class="form-control sl-form-control" name="start_year">
                                                    <option selected disabled hidden>Start Year</option>
                                                    <?php
                                                    $year = 2020;
                                                    for(;$year > 1960; $year--){
                                                    ?>
                                                    <option value="<?=$year?>"><?=$year?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <label>
                                                <select name="end_month" id="sl-intervals" class="form-control sl-form-control">
                                                    <option selected disabled hidden>End Month</option>
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
                                            </label>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <label>
                                                <select id="sl-intervals" class="form-control sl-form-control" name="end_year">
                                                    <option selected disabled hidden>Start End</option>
                                                    <?php
                                                    $year = 2020;
                                                    for(;$year > 1960; $year--){
                                                    ?>
                                                    <option value="<?=$year?>"><?=$year?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </label>
                                        </div>



                                        <span id="table_subjectgrade">


                                         </span>


{{--                                        <div class="form-group sl-manageTimeSlots__btn">--}}
{{--                                            <button type="submit" class="btn sl-btn">Add Now</button>--}}
{{--                                            <p>Click “Add Now” to add latest time slots</p>--}}
{{--                                        </div>--}}
                                    </div>


                                    <div class="sl-form__wrap">
                                        <div class="form-group">
                                            <textarea class="form-control" name="achievements" placeholder="Achievements"></textarea>
                                        </div>
                                    </div>

                                    <div class="sl-form__wrap">
                                        <table class="table table-sm table-hover" id="table_subjectgrade">
                                            <thead style="background-color: #2cdd9b;color: ghostwhite">
                                            <tr>
                                                <th style="padding: 10px;">Subject</th>
                                                <th style="padding: 10px;">Grade</th>

                                                <th style="padding: 10px;" colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="subject_grade_tbody">

                                            <tr>
                                                <td>
                                                    <input type="text" name="subject" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="grade" class="form-control"/>
                                                </td>
                                                <td>


                                                </td>
                                                <td>
                                                    <a onclick="commonServer.addNewSubjectAndGrade(this)" href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-plus" style="margin-top: 10px;margin-left: 15px;"></i></a>

                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="sl-form__wrap">
                                        <table class="table table-sm table-hover" id="table_subjectgrade">
                                            <thead style="background-color: #2cdd9b;color: ghostwhite">
                                            <tr>
                                                <th style="padding: 10px;">Subject</th>
                                                <th style="padding: 10px;">Grade</th>

                                                <th style="padding: 10px;" colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="subject_grade_tbody">

                                            <tr>
                                                <td>
                                                    <input type="text" name="subject" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="grade" class="form-control"/>
                                                </td>
                                                <td>


                                                </td>
                                                <td>
                                                    <a onclick="commonServer.addNewSubjectAndGrade(this)" href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-plus" style="margin-top: 10px;margin-left: 15px;"></i></a>

                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#collapse2" aria-expanded="false">
                        <div class="d-flex">
                            <h6>Tuesday</h6>
                            <p class="sl-servicedays__title--hidden">(Unavailable)</p>
                        </div>
                        <div class="sl-servicedays__title--rightarea">
                            <div class="sl-btnaction">
                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapse2" class="collapse" data-parent="#accordion1">
                        <div class="sl-servicedays__spaces">
                            <div class="sl-servicedays__spaces--rightarea">
                                <p>Click “Add Custom Slot” to add custom time slots</p>
                                <a href="javascript:void(0);" class="btn sl-btn">Add Custom Slot</a>
                            </div>
                            <ul class="sl-servicedays__spaces--content">
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:00 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#collapse3" aria-expanded="false">
                        <div class="d-flex">
                            <h6>Wednesday</h6>
                            <p class="sl-servicedays__title--hidden">(Unavailable)</p>
                        </div>
                        <div class="sl-servicedays__title--rightarea">
                            <div class="sl-btnaction">
                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapse3" class="collapse" data-parent="#accordion1">
                        <div class="sl-servicedays__spaces">
                            <div class="sl-servicedays__spaces--rightarea">
                                <p>Click “Add Custom Slot” to add custom time slots</p>
                                <a href="javascript:void(0);" class="btn sl-btn">Add Custom Slot</a>
                            </div>
                            <ul class="sl-servicedays__spaces--content">
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:00 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#collapse4" aria-expanded="false">
                        <div class="d-flex">
                            <h6>Thursday</h6>
                            <p class="sl-servicedays__title--hidden">(Unavailable)</p>
                        </div>
                        <div class="sl-servicedays__title--rightarea">
                            <div class="sl-btnaction">
                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapse4" class="collapse" data-parent="#accordion1">
                        <div class="sl-servicedays__spaces">
                            <div class="sl-servicedays__spaces--rightarea">
                                <p>Click “Add Custom Slot” to add custom time slots</p>
                                <a href="javascript:void(0);" class="btn sl-btn">Add Custom Slot</a>
                            </div>
                            <ul class="sl-servicedays__spaces--content">
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:00 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#collapse5" aria-expanded="false">
                        <div class="d-flex">
                            <h6>Friday</h6>
                            <p class="sl-servicedays__title--hidden">(Unavailable)</p>
                        </div>
                        <div class="sl-servicedays__title--rightarea">
                            <div class="sl-btnaction">
                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapse5" class="collapse" data-parent="#accordion1">
                        <div class="sl-servicedays__spaces">
                            <div class="sl-servicedays__spaces--rightarea">
                                <p>Click “Add Custom Slot” to add custom time slots</p>
                                <a href="javascript:void(0);" class="btn sl-btn">Add Custom Slot</a>
                            </div>
                            <ul class="sl-servicedays__spaces--content">
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>08:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>09:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>10:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:25 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:30 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>11:55 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:00 am</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>12:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:00 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:25 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:30 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-servicedays__spaces--spaces">
                                        <p>01:55 pm</p>
                                        <p class="sl-servicedays__spaces--text">Spaces: 05</p>
                                        <a href="javascript:void(0);" class="sl-servicedays__spaces--crossbtn"><i class="lnr lnr-cross"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sl-servicedays__title sl-unavailable" data-toggle="collapse" role="list" data-target="#collapse6" aria-expanded="false">
                        <div class="d-flex">
                            <h6>Saturday</h6>
                            <p class="sl-servicedays__title--hidden">(Unavailable)</p>
                        </div>
                        <div class="sl-servicedays__title--rightarea">
                            <div class="sl-btnaction">
                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapse6" class="collapse" data-parent="#accordion1">
                        <div class="sl-servicedays__spaces">
                            <div class="sl-servicedays__spaces--rightarea">
                                <p>This slot is marked as "Day Off"</p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-servicedays__title sl-unavailable" data-toggle="collapse" role="list" data-target="#collapse7" aria-expanded="false">
                        <div class="d-flex">
                            <h6>Sunday</h6>
                            <p class="sl-servicedays__title--hidden">(Unavailable)</p>
                        </div>
                        <div class="sl-servicedays__title--rightarea">
                            <div class="sl-btnaction">
                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="collapse7" class="collapse" data-parent="#accordion1">
                        <div class="sl-servicedays__spaces">
                            <div class="sl-servicedays__spaces--rightarea">
                                <p>This slot is marked as "Day Off"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/registeration_form.js')}}"></script>
@endsection


