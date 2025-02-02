<!-- Preloader -->
<div id="preloader">
    <div class="spinner"></div>
</div>
<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area d-flex justify-content-between align-items-center">
        <!-- Contact Info -->
        <div class="contact-info">
            <a href="#"><span>Phone:</span> +92 302 444 7090</a>
            <a href="#"><span>Email:</span> codestackx@gmail.com</a>
        </div>
        <!-- Follow Us -->
        <div class="follow-us">
            <span>Follow us</span>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="clever-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="cleverNav">

                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>

                            <li><a href="{{route('site.home')}}">Home</a></li>
                            <li><a href="{{route('site.tution_rates')}}">Tution Rates</a></li>
                            <li><a  href="{{route('site.faqs')}}">FAQ's</a></li>
                            <li><a  href="{{route('site.tuition_assignments')}}">Tuition Assignments</a></li>

                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="{{route('site.aboutus')}}">About us</a> </li>
                            <li><a href="{{route('site.contact')}}">Contact</a></li>
                        </ul>




                        @if(!session('tutor_logged'))
                        <!-- Register / Login -->
                        <div class="register-login-area">
                            <a href="{{route('site.tutor.register')}}">Register as Tutor</a>
                            <a href="{{route('site.user.login')}}" class="btn">Member Login</a>
                        </div>

                            @else
                                <div class="register-login-area">
                                    <a href="{{route('tutor.dashboard')}}">Dashboard</a>
                                    <a href="{{route('tutor.logout')}}">Logout</a>
                                </div>
                            @endif


                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
