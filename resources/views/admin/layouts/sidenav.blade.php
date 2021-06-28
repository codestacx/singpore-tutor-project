<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><a href="{{route('admin.home')}}"><img style="width: 90px;height: 90px" src="{{asset('admin/img/admin.jpg')}}" alt="person" class="img-fluid rounded-circle"></a>
                <h2 class="h5">{{session('admin_name')}}</h2><span>Administrator</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">

            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="{{route('admin.home')}}"> <i class="icon-home"></i>Home</a></li>


                <li><a href="{{route('admin.tutors')}}"> <i class="icon-home"></i>Tutors</a></li>
                <li><a href="{{route('admin.tutor_requests')}}"> <i class="icon-home"></i>Tutor Requests</a></li>

                <li><a href="{{route('admin.tution_assignments')}}"> <i class="icon-home"></i>Assignments</a></li>



                <li><a href="{{route('admin.levels')}}"> <i class="icon-home"></i>Levels </a></li>
                <li><a href="{{route('admin.grades')}}"> <i class="icon-home"></i>Grades </a></li>
                <li><a href="{{route('admin.subjects')}}"> <i class="icon-home"></i>Subjects </a></li>
                <li><a href="{{route('admin.schools')}}"> <i class="icon-home"></i>Schools </a></li>
                <li><a href="{{route('admin.faqs')}}"> <i class="icon-home"></i>FAQ's </a></li>

                <li><a href="{{route('admin.locations')}}"> <i class="icon-home"></i>Locations </a></li>
                <li><a href="{{route('admin.places')}}"> <i class="icon-home"></i>Places </a></li>

                <li><a href="{{route('admin.citizenships')}}"> <i class="icon-home"></i>Citizenships </a></li>

                <li><a href="{{route('admin.instruments')}}"> <i class="icon-home"></i>Instruments </a></li>
                <li><a href="{{route('admin.races')}}"> <i class="icon-home"></i>Races </a></li>

                <li><a href="#tablesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-grid"></i>Categories </a>
                    <ul id="tablesDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('admin.categories.students')}}">Students</a></li>
                        <li><a href="{{route('admin.categories.tutors')}}">MOE Teachers</a></li>
                    </ul>
                </li>

                <li><a href="{{route('admin.tutor_types')}}"> <i class="icon-home"></i>Tutor Types </a></li>
                <li><a href="{{route('admin.rates')}}"> <i class="icon-home"></i>Tutor Rates </a></li>


            </ul>
        </div>

    </div>
</nav>
