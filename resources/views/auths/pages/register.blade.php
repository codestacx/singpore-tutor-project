@extends('layouts.app')
@section('title','Site | Home')
@section('links')
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
@endsection
@section('content')

  <div class="container">

       <div class="row">
           <div class="col-sm">
               <div class="signup-form">
                   <h6>Are you looking for tuition assignments or music students?</h6>
                   <p>Start Tuition receive more than 100 new tutoring requests from parents every week. Get suitable home tuition jobs:</p>
                   <p><i class="fa fa-check" style="color: #00d69f"> </i>&nbsp;&nbsp;for your preferred levels and subjects</p>
                   <p><i class="fa fa-check" style="color: #00d69f"> </i> &nbsp;&nbsp;within your asking rates</p>
                   <p><i class="fa fa-check" style="color: #00d69f"> </i>&nbsp;&nbsp; at your preferred locations</p>

                   <p>Primary school assignments, secondary school assignments, English tuition, Maths tuition, Piano lessons etc are all available here.
                   </p>

                   <span><i class="fa fa-times" style="color: #b21f2d"></i> If you're above 18 years old and a Singapore citizen, Singapore PR, or a valid Student Pass holder,</span>
               </div>

               <div class="signup-form">
                   <p>
                       Average hourly rates for different tutor categories for academic tuition jobs (Pri, Sec, JC, IB, Diploma, Degree tuition)
                   </p>

                   <small>* Final rates depends on your qualifications, years of experience and track record.</small>

                   <table class="table table-hover">
                       <thead>
                       <tr style="background-color: #00d69f;color: white">
                           <td></td>
                           <td>Full Time Students</td>
                           <td>Private Tutors</td>
                           <td>MOE School Teachers</td>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>Preschool</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                       </tr>
                       <tr>
                           <td>Preschool</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                       </tr>
                       <tr>
                           <td>Preschool</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                       </tr>
                       <tr>
                           <td>Preschool</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                           <td>$18 to $25</td>
                       </tr>

                       </tbody>
                   </table>

               </div>
           </div>
           <div class="col-sm">
               <?php generateFlashMessage();?>
               <div class="signup-form">
                   <form action="{{route('site.tutor.register')}}" method="post">
                       @csrf
                       <h2>Create an Account</h2>
                       <p class="hint-text">Sign up with your social media account or email address</p>
                       <div class="social-btn text-center">
                           <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-facebook"></i> Facebook</a>
                           <a href="#" class="btn btn-info btn-lg"><i class="fa fa-twitter"></i> Twitter</a>
                           <a href="{{url('/auth/redirect')}}" class="btn btn-danger btn-lg"><i class="fa fa-google"></i> Google</a>
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
                   <div class="text-center">Already have an account? <a href="#">Login here</a></div>
               </div>
           </div>
       </div>


    </div>

@endsection

