<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{route('admin.home')}}" class="navbar-brand">
                        <div class="brand-text d-none d-md-inline-block"><span>Admin </span><strong class="text-primary">Dashboard</strong></div></a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Notifications dropdown-->

                    <!-- Messages dropdown-->

                    <!-- Languages dropdown    -->

                    <!-- Log out-->
                    <li class="nav-item"><a href="{{route('admin.logout')}}" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
