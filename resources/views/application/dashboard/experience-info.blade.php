@extends('application.dashboard.layouts.app')
@section('title','Tutor | Experience Information')
@section('links')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-select.css')}}">
@endsection
@section('content')

    <div class="col-lg-8 col-xl-9">
        <div class="sl-tab sl-profileSetting">
            <nav class="nav">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-companyDetail-tab" data-toggle="tab" href="#nav-companyDetail" role="tab" aria-controls="nav-companyDetail" aria-selected="true"> Academic (E.g. Primary, Secondary, JC, University) </a>



                    <a class="nav-item nav-link" id="nav-aboutDescription-tab" data-toggle="tab" href="#nav-aboutDescription" role="tab" aria-controls="nav-aboutDescription" aria-selected="true"> Music (E.g. Piano, Flute, Clarinet) </a>

                </div>
            </nav>
            <div id="nav-tabContent" class="tab-content">
                <div class="tab-pane fade show active" id="nav-companyDetail" role="tabpanel" aria-labelledby="nav-companyDetail-tab">
                    @if($academic == 0)
                    <form method="post" action="{{route('tutor.profile.experience_info',['action'=>'academic'])}}">
                     @csrf
                      <div class="sl-dashboardbox">
                          <div class="sl-dashboardbox__title">
                              <h2>Academic Basic</h2>
                          </div>
                          <div class="sl-dashboardbox__content">

                              <div class="row">
                                  <div class="col">
                                      <div class="form-group">
                                          <label>Have you taught in MOE School </label>
                                          <select name="is_taught_in_moe" class="form-control form-control-sm" onchange="toggleForm(this)">
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col">
                                      <label>Students you have taught</label>
                                      <select name="students_taught[]"  class="form-control selectpicker show-menu-arrow" multiple >

                                          <option value="IB">IB</option>
                                          <option value="IGCSE">IGCSE</option>
                                          <option value="MOE Gifted Programme">MOE Gifted Programme</option>
                                          <option value="With ADHD">With ADHD</option>
                                          <option value="Autistic">Autistic</option>
                                          <option value="Dyslexic">Dyslexic</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>


                      <div class="sl-dashboardbox" id="moe_school_experience">
                          <div class="sl-dashboardbox__title">
                              <h2>MOE School Records</h2>
                          </div>
                          <div class="sl-dashboardbox__content">
                              <div  class="form-group">
                                  <h6>MOE School Records</h6>

                                  <div class="form-group moeschool">
                                      <input type="text" class="form-control" name="moe_number_experience" placeholder="Number of years teaching in MOE schools ?" />
                                  </div>


                                  <br/>
                                  <div class="table-responsive moeschool">
                                      <table class="table" id="moe_school_teaching_experience_table">
                                          <thead>
                                          <tr class="">
                                              <th></th>
                                              <th >Level</th>
                                              <th >Subject</th>
                                              <th>School</th>
                                              <th>Year <br/>Taught</th>
                                              <th>Last <br/>Taught</th>

                                          </tr>

                                          </thead>
                                          <tbody>
                                          <tr class="">
                                              <td style="text-align: right;float:right;">
                                                  <a href="javascript:void(0);" onclick="addAnotherAcademicRow('moe')"  class="sl-icon sl-editbtn"><i style="text-align: right;float:right;" class="fas fa-plus"></i></a>
                                              </td>
                                              <td class="">
                                                  <select name="level[]" class="form-control sl-form-control">
                                                      <option selected disabled>Level </option>
                                                      <?php foreach($levels as $level):?>
                                                      <option value="<?php echo $level->id?>"><?=$level->level_title?></option>

                                                      <?php endforeach;?>

                                                  </select></td>
                                              <td class="">
                                                  <select name="subjects[0][]"  class="selectpicker show-menu-arrow" multiple >
                                                      <?php foreach($subjects as $subject):?>
                                                      <option value="<?=$subject->subject_id?>"><?=$subject->subject_title?></option>
                                                      <?php endforeach;?>
                                                  </select>
                                              </td>

                                              <td>
                                                  <input type="text" style="width: 150px;"  name="school[]" id="" />
                                              </td>

                                              <td class=""><input name="years_taught[]" type="text"  style="width: 60px;"/> </td>
                                              <td class=""><input  name="last_taught[]" type="text" style="width: 60px;" /></td>

                                          </tr>

                                          </tbody>
                                      </table>
                                  </div>

                              </div>


                          </div>
                      </div>

                      <div class="sl-dashboardbox" id="private_school_experience">
                          <div class="sl-dashboardbox__title">
                              <h2>Private School Records</h2>
                          </div>
                          <div class="sl-dashboardbox__content">
                              <div >
                                  <div class="form-group privateschool">
                                      <input type="text" name="private_number_experience" class="form-control" placeholder="Number of years teaching in Private schools ?" />
                                  </div>


                                  <div class="table-responsive privateschool">
                                      <table class="table" id="private_school_teaching_experience_table">
                                          <thead>
                                          <tr class="">
                                              <th></th>
                                              <th >Level</th>
                                              <th >Subject</th>
                                              <th>School</th>
                                              <th>Year <br/>Taught</th>
                                              <th>Last <br/>Taught</th>

                                          </tr>

                                          </thead>
                                          <tbody>
                                          <tr class="">
                                              <td style="text-align: right;float:right;">
                                                  <a href="javascript:void(0);" onclick="addAnotherAcademicRow('private')"  class="sl-icon sl-editbtn"><i style="text-align: right;float:right;" class="fas fa-plus"></i></a>
                                              </td>
                                              <td class="">
                                                  <select name="private_level[]" class="form-control sl-form-control">
                                                      <option selected disabled>Level </option>
                                                      <?php foreach($levels as $level):?>
                                                      <option value="<?php echo $level->id?>"><?=$level->level_title?></option>

                                                      <?php endforeach;?>

                                                  </select></td>
                                              <td class="">
                                                  <select name="private_subjects[0][]"  class="selectpicker show-menu-arrow" multiple >
                                                      <?php foreach($subjects as $subject):?>
                                                      <option value="<?=$subject->subject_id?>"><?=$subject->subject_title?></option>
                                                      <?php endforeach;?>
                                                  </select>
                                              </td>

                                              <td>
                                                  <input type="text" style="width: 150px;"  name="private_school[]" id="" />
                                              </td>

                                              <td class=""><input name="private_years_taught[]" type="text"  style="width: 60px;"/> </td>
                                              <td class=""><input  name="private_last_taught[]" type="text" style="width: 60px;" /></td>

                                          </tr>

                                          </tbody>
                                      </table>
                                  </div>
                              </div>

                          </div>
                      </div>

                      <div class="sl-dashboardbox">
                          <div class="sl-dashboardbox__title">
                              <h2>Completed</h2>
                          </div>
                          <div class="sl-dashboardbox__content">
                              <fieldset>
                                  <div class="sl-form__wrap">



                                      <div class="form-group sl-manageTimeSlots__btn">
                                          <button type="submit" class="btn sl-btn">Save & Continue</button>
                                            <p>Once submitted there will be no way to rollback </p>
                                      </div>
                                  </div>
                              </fieldset>
                          </div>
                      </div>
                  </form>
                 @else
                        <div class="sl-dashboardbox">
                            <div class="sl-dashboardbox__title">
                                <h2>Locked</h2>
                            </div>
                            <div class="sl-dashboardbox__content">
                                <fieldset>
                                    <div class="sl-form__wrap">



                                        <div class="form-group sl-manageTimeSlots__btn">

                                            <p>Academic Record is Already added </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php generateFlashMessage();?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    @endif

                </div>



                <div class="tab-pane fade" id="nav-aboutDescription" role="tabpanel" aria-labelledby="nav-aboutDescription-tab">

                    @if($music == 0)
                        <form class="sl-form sl-change-password" action="{{route('tutor.profile.experience_info',['action'=>'music'])}}" method="POST">
                            @csrf
                            <div class="sl-dashboardbox">
                                <div class="sl-dashboardbox__title">
                                    <h2>Experience & Level</h2>
                                </div>
                                <div class="sl-dashboardbox__content">

                                    <fieldset>
                                        <div class="sl-form__wrap">
                                            <div class="form-group form-group-half">
                                                <div class="sl-on-off">
                                                    <input type="checkbox" id="hide-on" name="is_fulltime_music_teacher" checked="">
                                                    <label for="hide-on"><i></i></label>
                                                    <span>Full Time Music Teacher ? </span>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input type="text" class="form-control sl-form-control" placeholder="Theory Level" name="thoery_level">
                                            </div>

                                        </div>
                                    </fieldset>

                                </div>


                                <div class="sl-dashboardbox__title">
                                    <h2>Teaching History</h2>
                                </div>
                                <div class="sl-dashboardbox__content">



                                    <div class="row">
                                        <div class="col">
                                            <label>
                                                Music Teaching Experience
                                            </label>
                                            <input type="text" class="form-control" name="no_of_years_experience" placeholder="Experience"/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col">
                                            <label> Taught private lessons?  </label>
                                            <select name="is_taught_in_private"  class="form-control">

                                                <option value="1"> Yes </option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label> Taught in a School </label>
                                            <select name="is_taught_in_school"  class="form-control">

                                                <option value="1"> Yes </option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>


                                    <br/>
                                    <div class="row">
                                        <div class="col">
                                            <label>Details about School Teaching</label>
                                            <textarea class="form-control" name="taught_in_school_details"></textarea>
                                        </div>
                                    </div>

                                    <br/>
                                    <div class="row">
                                        <div class="col">
                                            <label>Details about Private Teaching</label>
                                            <textarea class="form-control" name="taught_in_private_details"></textarea>
                                        </div>
                                    </div>


                                    <br/>


                                </div>

                                <div class="sl-dashboardbox__title">
                                    <h2>Proficiencies in Music Instruments</h2>
                                </div>
                                <div class="sl-dashboardbox__content">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Instrument</th>
                                                <th>Pracical Level</th>
                                                <th>Achievements</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <select name="instrument[]" class="custom-select custom-select-sm">
                                                        @foreach($instruments as $instrument)
                                                            <option value="{{$instrument->id}}">{{$instrument->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td> <input name="practical_level[]" type="text" src="" class="form-control" /> </td>
                                                <td> <textarea name="achievements[]" style="resize: none;height: 40px" class="form-control"></textarea> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="instrument[]" class="custom-select custom-select-sm">
                                                        @foreach($instruments as $instrument)
                                                            <option value="{{$instrument->id}}">{{$instrument->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td> <input name="practical_level[]" type="text" src="" class="form-control" /> </td>
                                                <td> <textarea name="achievements[]" style="resize: none;height: 40px" class="form-control"></textarea> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="instrument[]" class="custom-select custom-select-sm">
                                                        @foreach($instruments as $instrument)
                                                            <option value="{{$instrument->id}}">{{$instrument->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td> <input name="practical_level[]" type="text" src="" class="form-control" /> </td>
                                                <td> <textarea name="achievements[]" style="resize: none;height: 40px" class="form-control"></textarea> </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Play other music instruments? <code>Please give details here:</code></label>
                                                <textarea class="form-control" placeholder="Details..." name="other_music_details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="sl-dashboardbox">
                                    <div class="sl-dashboardbox__title">
                                        <h2>Completed</h2>
                                    </div>
                                    <div class="sl-dashboardbox__content">
                                        <fieldset>
                                            <div class="sl-form__wrap">


                                                <div class="form-group sl-manageTimeSlots__btn">
                                                    <button type="submit" class="btn sl-btn">Save & Continue</button>
                                                    <p>Once submitted there will be no way to rollback </p>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                        </form>

                    @else
                        <div class="sl-dashboardbox">
                            <div class="sl-dashboardbox__title">
                                <h2>Locked</h2>
                            </div>
                            <div class="sl-dashboardbox__content">
                                <fieldset>
                                    <div class="sl-form__wrap">



                                        <div class="form-group sl-manageTimeSlots__btn">

                                            <p>Music Record Information is added successfully </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php generateFlashMessage();?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    @endif
                </div>



            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script src="{{asset('dist/js/bootstrap-select.js')}}"></script>

@endsection

<script>
    var exp_index = 1;
    var prv_index = 1;
    const addAnotherAcademicRow=(action)=>{

        const table  = action === 'moe' ? 'moe_school_teaching_experience_table':'private_school_teaching_experience_table';
        const element = document.getElementById(table);
        $.ajax({
            url:'{{route('get-experience-row')}}',
            data:{action:action,index:action === 'moe'  ? exp_index++:prv_index++},
            dataType:'html',
            success:function (response) {
                element.querySelector('tbody').insertAdjacentHTML('beforeend',response);
                $('.selectpicker').selectpicker();
                if(action === 'moe'){
                    exp_index+=1;
                }else{
                    prv_index+=1;
                }

            }
        })


    }


    const toggleForm=(e)=>{
        const el = document.getElementById('moe_school_experience');
        if(e.value === 'No'){
            el.style.display = 'none'
        }else{
            el.style.display = ''
        }
    }
</script>


