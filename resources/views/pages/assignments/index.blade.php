@extends('layouts.app')
@section('title','Site | Assignments')
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
<style>
    #tution-assignments-table thead tr{
        background: #8a6d3b;
        color: white;
        border-radius: 5px;
    }
    #tution-assignments-table td{
            padding: 20px;
        text-align: center;
    }
</style>
@section('content')


    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Assignments</a></li>

            </ol>
        </nav>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="signup-form">

                </div>
                <div class="">

                    <div class="card" style="width: 350px;margin: auto;background: beige;color: black;border-radius: 10px;padding: 10px;margin-top: 20px">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('site.tuition_assignments')}}">

                                @csrf
                                <div class="form-group">
                                    <label>Subject</label>
                                    <select class="form-control form-control-sm" name="subject">
                                        <option disabled>Choose Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->subject_id}}">{{$subject->subject_title}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control form-control-sm" name="level">
                                        <option disabled> Choose Level </option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->level_title}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Locations / Online</label>
                                    <select class="form-control form-control-sm" name="location">
                                        <option disabled>Choose Location</option>
                                        @foreach($locations as $location)
                                            <option disabled style="color: #2cdd9b">{{$location->location_title}}</option>
                                            @foreach($location->places as $place)
                                                <option value="{{$place->id}}">{{$place->place}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning btn-sm btn-block" VALUE="Search"/>
                                </div>
                            </form>
                            <div style="color: deepskyblue" class="or-seperator"><b>or </b></div>
                            <form class="form" method="post" action="{{route('site.tuition_assignments')}}">
                               @csrf
                                <div class="form-group" style="text-align: center">
                                    <small> search for an Assignment</small>
                                </div>

                                <div class="form-group">
                                    <input type="text" placeholder="Assignment code" class="form-control form-control-sm" name="code"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-sm btn-block " value="Search"/>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm">
                <?php generateFlashMessage();?>
                <div class="signup-form">
                    <form action="{{route('site.tutor.register')}}" method="post">
                        @csrf
                        <h4 style="text-align: center">Want to take up Tuition Assignments?</h4>
                        <h5 style="text-align: center">Create an Account</h5>
                        <p class="hint-text">Sign up with your social media account or email address</p>
                        <div class="social-btn text-center">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-facebook"></i> </a>
                            <a href="#" class="btn btn-info btn-lg"><i class="fa fa-twitter"></i> </a>
                            <a href="{{url('/auth/redirect')}}" class="btn btn-danger btn-lg"><i class="fa fa-google"></i> </a>
                        </div>
                        <div class="or-seperator"><b>or</b></div>
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" name="name" value="<?php if(isset($user)) { echo $user['name']; }?>" placeholder="Your Name" required="required">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control input-lg" name="email" value="<?php if(isset($user)) { echo $user['email']; }?>" placeholder="Email Address" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" name="password" value="atif" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" name="confirm_password" value="atif" placeholder="Confirm Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Sign Up</button>
                        </div>

                    </form>
                    <div class="text-center">Already have an account? <a href="{{route('site.user.login')}}">Login here</a></div>
                </div>
            </div>
        </div>


    </div>
    <!-- ##### Best Tutors Area Start ##### -->
    <section class="best-tutors-area section-padding-100">

        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tution-assignments-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>ID</th>

                        <th>Requirements</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assignments as $assignment)

                        <tr>
                            <td class="col-2">{{\Carbon\Carbon::parse($assignment->created_at)->toFormattedDateString()}}</td>
                            <td class="col-2">{{$assignment->code}}</td>
                            <td class="col-6">
                                    @php echo getBadgeClass($assignment->category) @endphp
                                <br/>
                                {{$assignment->description}}
                                </td>
                            <td>
                                @if (!session('tutor_logged'))
                                    @if($assignment->active == 1)
                                        Open & Available.
                                        <a href="" class="btn btn-warning btn-sm">
                                            Apply here.</a>
                                    @else
                                        Not Available
                                    @endif
                                @else
                                    @if( !$assignment->applied)
                                    <p>Apply here if you're keen:</p>
                                    <form method="post" action="{{route('site.tuition_assignments',['action'=>'application'])}}">
                                       @csrf
                                        <textarea style="height: 185px;width: 300px;" class="form-control" placeholder="Your rate ? Your available slots ? " name="details"></textarea>

                                        <div class="form-group">
                                            <br/>
                                            <input type="hidden" name="assignment_id" value="{{$assignment->assignment_id}}"/>
                                            <input type="submit" class="btn btn-primary btn-sm" value="Apply"/>
                                        </div>
                                    </form>
                                        @else
                                        <span class="badge badge-primary">Already applied</span>
                                        @endif




                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- ##### Best Tutors Area End ##### -->


@endsection
