@extends('application.dashboard.layouts.app')
@section('title','Tutor | Preferences')
<style>
    #rates_per_hour_table input {
        border-top:none;
        border-right: none;border-left: none;
    }
</style>
@section('content')

    <div class="col-lg-8 col-xl-9">

        @if(!$preference)
            <form method="post" action="{{route('tutor.profile.preference_info')}}">

                @csrf
                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Availabiity</h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">
                        @php generateFlashMessage();@endphp
                        <span class="sl-manageTimeSlots__form sl-form">
                    @csrf
                    <fieldset>
                        <div class="sl-form__wrap">
                            <div class="form-group form-group-half">
                                <label>
                                    I am available to take tuition at... *
                                </label>
                            </div>

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



                            <div class="row" id="my_home_information" style="display: none">
                                <div class="form-group ">
                                <label>
                                    <input type="text" value="" name="tutor_home_postal" placeholder="Enter location postal code" class="form-control sl-form-control">

                                </label>
                            </div>
                            <div class="form-group ">
                                <label>
                                    <textarea name="class_criteria" placeholder="What can students expect for classes at my location:"  class="form-control sl-form-control"></textarea>
                                </label>
                                <small>e.g. Group size? Material cost? Are trial lessons free/chargeable? Classroom with whiteboard? etc</small>

                            </div>
                            </div>

                        </div>
                    </fieldset>
                </span>

                    </div>
                </div>


                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Locations</h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">

                <span class="sl-manageTimeSlots__form sl-form" >
                    @csrf
                    <fieldset>
                        @foreach($locations as $location)
                            <h5 style="color: deepskyblue">{{$location->location_title}}</h5>
                            <div class="sl-form__wrap">

                                @foreach($location->places as $place)
                                    <div class="form-group form-group-half">
                                <label>
                                   <input  type="checkbox" name="location[]"  value="{{$place->id}}"> {{$place->place}}
                                </label>
                            </div>
                                @endforeach
                        </div>

                        @endforeach

                    </fieldset>
                </span>

                    </div>
                </div>

                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Levels/Subjects</h2>
                    </div>
                    <div class="">
                        <div class="sl-tab sl-profileSetting">
                            <nav class="nav">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-companyDetail-tab" data-toggle="tab" href="#nav-companyDetail" role="tab" aria-controls="nav-companyDetail" aria-selected="true">Primary</a>



                                    <a class="nav-item nav-link" id="nav-aboutDescription-tab" data-toggle="tab" href="#nav-aboutDescription" role="tab" aria-controls="nav-aboutDescription" aria-selected="true">Secondary</a>
                                    <a class="nav-item nav-link" id="nav-experience-tab" data-toggle="tab" href="#nav-experience" role="tab" aria-controls="nav-experience" aria-selected="true">JC</a>
                                    <a class="nav-item nav-link" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab" aria-controls="nav-gallery" aria-selected="true">Foreign & Others</a>
                                </div>
                            </nav>
                            <div id="nav-tabContent" class="tab-content">
                                <div class="tab-pane fade show active" id="nav-companyDetail" role="tabpanel" aria-labelledby="nav-companyDetail-tab">
                                    <div class="sl-dashboardbox__content">


                                        <div class="row">
                                            <?php foreach($primary_grades as $grade):?>
                                            <div class="col">
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
                                <div class="tab-pane fade" id="nav-aboutDescription" role="tabpanel" aria-labelledby="nav-aboutDescription-tab">
                                    <div class="sl-dashboardbox__content">
                                        <div class="row">
                                            <?php foreach($secondary_grades as $grade):?>
                                            <div class="col">

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
                                <div class="tab-pane fade" id="nav-experience" role="tabpanel" aria-labelledby="nav-experience-tab">
                                    <div class="sl-dashboardbox__content">
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
                                </div>
                                <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                                    <div class="sl-dashboardbox__content">
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
                            </div>
                        </div>
                    </div>

                </div>

                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Charges</h2>
                    </div>
                    <div class="sl-dashboardbox__content">
                        <table class="table sl-my-payoutsTable" id="rates_per_hour_table">
                            <thead>
                            <tr>
                                <th scope="col">Level</th>
                                <th scope="col">Rate/hr</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td data-label="Date">Lower Primary</td>
                                <td data-label="Method"><input type="text" name="lower_primary_rate" class="form-control"/></td>

                            </tr>
                            <tr>

                                <td>Upper Primary</td>
                                <td data-label="Method"><input type="text" name="upper_primary_rate" class="form-control"/></td>

                            </tr>
                            <tr>


                                <td>Lower Secondary</td>
                                <td data-label="Method"><input type="text" name="lower_secondary_rate" class="form-control"/></td>


                            </tr>
                            <tr>


                                <td>Uper Secondary</td>
                                <td data-label="Method"><input type="text" name="uper_secondary_rate" class="form-control"/></td>

                            </tr>
                            <tr>

                                <td>JC</td>
                                <td data-label="Method"><input type="text" name="jc_rate" class="form-control"/></td>

                            </tr>

                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col">
                                <br/>
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



@endsection

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

