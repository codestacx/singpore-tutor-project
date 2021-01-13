@extends('layouts.app')
@section('title','Site | Contact Us')
@section('content')


    <!-- ##### Google Maps ##### -->
    <div class="map-area">
        <div id="googleMap" style="background-image: url({{asset('img/photo11.jpg')}});background-size: cover;height: 500px"></div>
    </div>

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-12 col-lg-6">
                    <div class="contact--info mt-50 mb-100">
                        <h4>Contact Info</h4>
                        <ul class="contact-list">
                            <li>
                                <h6><i class="fa fa-clock-o" aria-hidden="true"></i> Business Hours</h6>
                                <h6>9:00 AM - 18:00 PM</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone" aria-hidden="true"></i> Number</h6>
                                <h6>+44 300 303 0266</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-envelope" aria-hidden="true"></i> Email</h6>
                                <h6>info@clever.com</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-map-pin" aria-hidden="true"></i> Address</h6>
                                <h6>10 Suffolk st Soho, London, UK</h6>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-12 col-lg-6">

                    <div class="contact-form">
                        <h4>Login</h4>
                        <?php generateFlashMessage(); ?>
                        <form action="{{route('site.user.login')}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn clever-btn w-100">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@section('scripts')
    <!-- Google Maps -->

@endsection
@endsection
