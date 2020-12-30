@section('links')
    <link rel="stylesheet" href="{{asset('style/modal-tutor.css')}}"/>
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

                                <form class="tutor_free_request_form" action="#" method="post">
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
                                                <input type="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" name="level_grade">
                                                    <option selected disabled>Choose Grade</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn clever-btn w-100">Find Tutor</button>
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
