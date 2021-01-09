@extends('layouts.app')
@section('title','Site | Home')
@section('links')
    <link rel="stylesheet" href="{{asset('auth-user/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('auth-user/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('wizard/assets/css/bd-wizard.css')}}">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
@endsection
@section('content')



    @include('auths.layouts.head')
    <main>
        <div class="site-section">
            <div class="container">
                <br/>
                <form>
                    <div id="wizard">
                    <h3>
                        <div class="media">
                            <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
                            <div class="media-body">
                                <div class="bd-wizard-step-title">Basic Info</div>
                            </div>
                        </div>
                    </h3>
                    <section>
                        <div class="content-wrapper">

                          <div class="row" style="margin-top: 10px;padding: 20px;">
                              <div class="col-sm-12 col-md-8 col-lg-8" >
                                  <div class="contact-form-wizard">

                                      <div class="card" >
                                          <div class="card-body">

                                              <div class="row">
                                                  <div class="col-12 col-lg-6">
                                                      <div class="form-group">
                                                          <input type="text" name="fullname" class="form-control"   placeholder="Full Name">
                                                      </div>
                                                  </div>
                                                  <div class="col-12 col-lg-6">
                                                      <div class="form-group">
                                                         <select class="form-control" name="gender">
                                                             <option disabled selected> Choose Gender</option>
                                                             <option value="Male">Male</option>
                                                             <option value="Female">Female</option>
                                                         </select>
                                                      </div>
                                                  </div>

                                              </div>

                                              <div class="row">
                                                  <div class="col-12 col-lg-6">
                                                      <div class="form-group">
                                                          <input type="tel" name="mobile" class="form-control"   placeholder="Mobile Number ">
                                                      </div>
                                                  </div>
                                                  <div class="col-12 col-lg-6">
                                                      <div class="form-group">
                                                          <select class="form-control" name="gender">
                                                              <option disabled selected> Choose Birth Year</option>
                                                              @php
                                                                  $year = 2020;
                                                                  for(;$year > 1960; $year--){
                                                                      @endphp
                                                                        <option value="{{$year}}">{{$year}}</option>
                                                                  @php
                                                                  }
                                                              @endphp
                                                          </select>
                                                      </div>
                                                  </div>

                                              </div>
                                              <div class="row">
                                                  <div class="col-12 col-lg-6">
                                                      <div class="form-group">
                                                          <input type="tel" name="postal_code" class="form-control"   placeholder="Postal Code ">
                                                      </div>
                                                  </div>
                                                  <div class="col-12 col-lg-6">
                                                      <div class="form-group">
                                                          <select class="form-control" name="race">
                                                              <option disabled selected> Choose Race</option>
                                                              @php
                                                                  $year = 2020;
                                                                  for(;$year > 1960; $year--){
                                                              @endphp
                                                              <option value="{{$year}}">{{$year}}</option>
                                                              @php
                                                                  }
                                                              @endphp
                                                          </select>
                                                      </div>
                                                  </div>

                                              </div>

                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-4 col-lg-4">
                                  <div class="card">
                                      <h4 class="card-title">Instructions</h4>
                                      <div class="card-body">
                                          1.here
                                      </div>
                                  </div>
                              </div>
                          </div>

                        </div>
                    </section>
                    <h3>
                        <div class="media">
                            <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
                            <div class="media-body">
                                <div class="bd-wizard-step-title">Employ Details</div>
                                <div class="bd-wizard-step-subtitle">Step 2</div>
                            </div>
                        </div>
                    </h3>
                    <section>
                        <div class="content-wrapper">
                            <h4 class="section-heading">Enter your Employment details </h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="designation" class="sr-only">Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="department" class="sr-only">Department</label>
                                    <input type="text" name="department" id="department" class="form-control" placeholder="Department">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="employeeNumber" class="sr-only">Employee Number</label>
                                    <input type="text" name="employeeNumber" id="employeeNumber" class="form-control" placeholder="Employee Number">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="workEmailAddress" class="sr-only">Work Email Address</label>
                                    <input type="email" name="workEmailAddress" id="workEmailAddress" class="form-control" placeholder="Work Email Address">
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>
                        <div class="media">
                            <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i></div>
                            <div class="media-body">
                                <div class="bd-wizard-step-title">Review </div>
                                <div class="bd-wizard-step-subtitle">Step 3</div>
                            </div>
                        </div>
                    </h3>
                    <section>
                        <div class="content-wrapper">
                            <h4 class="section-heading mb-5">Review your Details</h4>
                            <h6 class="font-weight-bold">Personal Details</h6>
                            <p class="mb-4"><span id="enteredFirstName">Cha</span> <span id="enteredLastName">Ji-Hun C</span> <br>
                                Phone: <span id="enteredPhoneNumber">+230-582-6609</span> <br>
                                Email: <span id="enteredEmailAddress">willms_abby@gmail.com</span></p>
                            <h6 class="font-weight-bold">Employment Details</h6>
                            <p class="mb-0"><span id="enteredDesignation">Junior Developer</span> - <span id="enteredDepartment">UI Development</span> <br>
                                Phone: <span id="enteredEmployeeNumber">JDUI36849</span> <br>
                                Email: <span id="enteredWorkEmailAddress">willms_abby@company.com</span></p>
                        </div>
                    </section>
                    <h3>
                        <div class="media">
                            <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
                            <div class="media-body">
                                <div class="bd-wizard-step-title">Submit</div>
                                <div class="bd-wizard-step-subtitle">Step 4</div>
                            </div>
                        </div>
                    </h3>
                    <section>
                        <div class="content-wrapper">
                            <h4 class="section-heading mb-5">Accept agreement and Submit</h4>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                    I hereby declare that I had read all the <a href="#!">terms and conditions</a>  and all the details provided my me in this form are true.
                                </label>
                            </div>
                        </div>
                    </section>
                </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="{{asset('auth-user/js/main.js')}}"></script>
    <script src="{{asset('wizard/assets/js/jquery.steps.min.js')}}"></script>
    <script src="{{asset('wizard/assets/js/bd-wizard.js')}}"></script>
@endsection
