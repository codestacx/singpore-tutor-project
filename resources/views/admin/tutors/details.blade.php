@extends('admin.layouts.app')
@section('title','Tutor Profile')
<style>
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 200px;
        height: 150px;
        border-radius: 10px;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }
    .profile-edit-btn{
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
    .proile-rating{
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
</style>
@section('content')


    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Tutor Profile  </li>
            </ul>
        </div>
    </div>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{asset('profiles/'.$tutor->name.'/'.$tutor->basicinfo->profile_image)}}" alt=""/>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{$tutor->name}}
                        </h5>
                        <h6>
                            Teacher
                        </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><small>About</small></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><small>Academic & Music Experience</small></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false"><small>Education</small></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="preference-tab" data-toggle="tab" href="#preference" role="tab" aria-controls="preference" aria-selected="false"><small>Preference</small></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Approve"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br/>
                        <a href="">Bootsnipp Profile</a><br/>
                        <a href="">Bootply Profile</a>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->id}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->basicinfo->mobile}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Home Tutor/ Remote Tutor</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Private Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->academic_info->private_number_experience}} Years</p>
                                </div>
                            </div>
                            @if($tutor->academic_info->is_taught_in_moe == 'Yes')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Moe Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->academic_info->moe_number_experience}} Years</p>
                                </div>
                            </div>

                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Students Taught</label>
                                </div>
                                <div class="col-md-6">
                                    @foreach($tutor->academic_info->students_taught as $student)
                                     <p> <i class="fa fa-check" style="color: #2cdd9b"></i> {{$student}}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Full Time Music Tutor</label>
                                </div>
                                <div class="col-md-6">
                                     {{$tutor->music_info->is_fulltime_music_teacher == 1 ? 'Yes':'No'}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Theory Level</label>
                                </div>
                                <div class="col-md-6">
                                    {{$tutor->music_info->theory_level}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Experience</label>
                                </div>
                                <div class="col-md-6">
                                    {{$tutor->music_info->no_of_years_experience}}
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Category</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->education_info->category}}</p>
                                </div>
                            </div>
                            @if(in_array($tutor->education_info->category,['MOE School Teacher','Full Time Student']))
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Type</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->education_info->sub_category}}</p>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Highest Qualification</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->education_info->highest_qualification}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>NIE Trained</label>
                                </div>
                                <div class="col-md-6">
                                    <?= $tutor->education_info->is_nie_trained == 0 ? 'No':'Yes' ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="preference" role="tabpanel" aria-labelledby="preference-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Available at Student Home</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->preference_info->availability_at_student_home == 1 ? 'Yes':'No'}} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Available at Own Home</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$tutor->preference_info->availability_at_tutor_home == 1 ? 'Yes':'No'}} </p>
                                </div>
                            </div>
                            @if($tutor->preference_info->availability_at_tutor_home == 1)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tutor Home Postal</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$tutor->preference_info->tutor_home_postal}} </p>
                                    </div>
                                </div>

                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>


    <div class="row">

        <div class="col-lg-12">
             <h3> &nbsp;&nbsp;Academic Background </h3>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                     Private School Records
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Level</th>
                                <th>School</th>
                                <th>Subjects</th>

                                <th>Years Taught  </th>

                                <th> Last Taught</th>

                            </tr>
                            </thead>
                            <tbody>

                              @foreach($tutor->academic_info->private_experiences as $experience)
                                <tr>
                                    @php $experience = (object)$experience;  @endphp
                                    <td>{{$experience->level}}</td>
                                    <td>{{$experience->school}}</td>
                                    <td>
                                        @php convertSubjectsJSONto($experience->subject)  @endphp
                                    </td>
                                    <td>
                                        {{$experience->years_taught}}
                                    </td>
                                    <td>
                                        {{$experience->last_taught}}
                                    </td>
                                </tr>
                              @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($tutor->academic_info->is_taught_in_moe == 'Yes')
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        Moe School Records
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatable1" style="width: 100%;" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>School</th>
                                    <th>Subjects</th>

                                    <th>Years Taught  </th>

                                    <th> Last Taught</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($tutor->academic_info->moe_experiences as $experience)
                                   <tr>
                                       @php $experience = (object)$experience;  @endphp
                                       <td>{{$experience->level}}</td>
                                       <td>{{$experience->school}}</td>
                                       <td>
                                           @php convertSubjectsJSONto($experience->subject)  @endphp
                                       </td>
                                       <td>
                                           {{$experience->years_taught}}
                                       </td>
                                       <td>
                                           {{$experience->last_taught}}
                                       </td>
                                   </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        @endif


        <div class="col-lg-12">
            <h3> &nbsp;&nbsp;Musical Background </h3>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    Music Teaching Experience
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table table-hover">
                            <thead style="background: #2cdd9b;color: white">
                            <tr>
                                <th>Instrument</th>
                                <th>Practical Level</th>
                                <th>Achievement</th>



                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tutor->music_info->proficiencies as $proficiency)
                                <tr>
                                    @php $proficiency = (object)$proficiency;  @endphp
                                    <td>

                                        {{\App\Models\Instrument::find($proficiency->instrument)->title}}
                                    </td>
                                    <td>{{$proficiency->achievements}}</td>
                                    <td>{{$proficiency->practical_level}}</td>


                                </tr>
                            @endforeach
                            </tbody>

                            <hr/>
                            <thead style="background: #28a745;color: white">
                            <tr>
                                <th></th>
                                <th>Taught in School</th>
                                <th>Details </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td></td>
                                <td><?= $tutor->music_info->is_taught_in_school == 1 ? 'Yes':'No' ?></td>
                                <td><?= !is_null($tutor->music_info->taught_in_school_details) ?  $tutor->music_info->taught_in_school_details: 'Not Provided'  ?></td>
                            </tr>
                            </tbody>

                            <thead style="background: #2cdd9b;color: white ">
                            <tr>
                                <th></th>
                                <th>Taught in Private School</th>
                                <th>Details </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td></td>
                                <td><?= $tutor->music_info->is_taught_in_private == 1 ? 'Yes':'No' ?></td>
                                <td><?= !is_null($tutor->music_info->taught_in_private_details) ?  $tutor->music_info->taught_in_private_details: 'Not Provided'  ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex align-items-center">
                    Educational Background
                </div>

                <div class="card-body">

                    <div class="table-responsive">


                        @php
                            $deploma_degree_others = [6,7,8];
                        @endphp


                                <div class="accordion" id="accordionExample">
                                    @foreach($tutor->education_info_courses as $info)
                                        <div class="card">
                                            <div class="card-header" id="{{'headingOne'.$info->_id}}">
                                                <h2 class="mb-0">
                                                    <button  class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{"collapseOne".$info->_id}}" aria-expanded="true" aria-controls="{{"collapseOne".$info->_id}}">
                                                        {{$info->school_level. ' /  '. $info->school_name}}
                                                    </button>
                                                    <span style="float: right;text-align: right;font-size: 16px"> <small>{{'From '. $info->start_month.'/'.$info->start_year}} <span>To</span> {{$info->end_month.'/'.$info->end_year}}</small></span>
                                                </h2>
                                            </div>
                                            <div id="{{"collapseOne".$info->_id}}" class="collapse" aria-labelledby="{{'headingOne'.$info->_id}}" data-parent="#accordionExample">
                                                <div class="card-body">

                                                   @if (!in_array($info->school,[6,7,8]))


                                                    <table id="datatable1" style="width: 100%;" class="table table-hover">


                                                        <thead>
                                                        <tr style="width: 100%">
                                                            <th>Grade</th>
                                                            <th>Subject</th>


                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($info->subjects_and_grades as $grade)
                                                            @php $grade = (object)$grade;  @endphp
                                                            <tr>
                                                                <td>{{$grade->grade}}</td>
                                                                <td>{{$grade->subject}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                       @else
                                                        <table id="datatable1" style="width: 100%;" class="table table-hover">


                                                            <thead>
                                                            <tr style="width: 100%">
                                                                <th>#</th>
                                                                <th>Major</th>


                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach($info->subjects_or_majors as $grade)

                                                                <tr>
                                                                    <td>{{$info->_id}}</td>
                                                                    <td>{{$grade}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif

                                                    <br/>
                                                    <div class="card-footer">
                                                        <h5>Achievements</h5>
                                                        <p>
                                                            {{$info->achievements}}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach




                                </div>



                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex align-items-center">
                   Preference
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable1" style="width: 120%;" class="table table-hover">
                            <thead style="background: #E1B42B;color: white">
                            <tr>
                                <th>Location</th>
                                <th>Fall In</th>




                            </tr>
                            </thead>
                            <tbody>


                            @foreach($tutor->preference_info->location as $location)

                                @php
                                        echo getLocationAndPlace($location ,$places)
                                @endphp

                            @endforeach
                            </tbody>

                            <hr/>
                            <thead style="background: deepskyblue;color: white">
                            <tr>
                                <th>Level</th>
                                <th>Grade </th>
                                <th>Subject</th>
                            </tr>
                            </thead>

                            <tbody>
                           @foreach($tutor->students_records as $record)
                               <tr>
                                   <td>{{$record->level}}</td>
                                   <td>{{$record->grade}}</td>
                                   <td>{{$record->subject}}</td>
                               </tr>
                           @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

