@section('links')
    <link rel="stylesheet" href="{{asset('style/modal-tutor.css')}}"/>
    <meta name="_token" content="{{ csrf_token() }}">
@endsection
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="fa fa-user-circle"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Great!</h4>
                <p>Your are almost here to book your first free tutor.</p>
                     <!-- Register Contact Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="forms">
                            <span id="response_message"></span>
                                <form class="tutor_free_request_form" id="tutor_free_request_form" action="{{route('site.tutor.request')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="fname" class="form-control" id="text" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control"   placeholder="Enter Requirement Message (optional)" name="description"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12" id="add_level_grade">
                                            <div class="form-group">
                                                <select class="form-control" name="level_grade[grades][]">
                                                   @foreach($levels as $level)
                                                       <option value="" style="color: #00d69f" disabled><h5 style="color: #00d69f">{{$level->level_title}}</h5></option>
                                                       @foreach($level->grades as $grade)
                                                           <option value="{{$grade->grade_id}}">{{$grade->grade_title}}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>



                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                 <a href="javascript:;" onclick="Server.addAnotherTutorRequestFormRow()"> <i class="fa fa-plus"></i> &nbsp;&nbsp; Add Another Student</a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"   class="btn clever-btn w-100">Find Tutor</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



{{--                <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i class="material-icons">&#xE5C8;</i></button>--}}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>

    </script>
@endsection
