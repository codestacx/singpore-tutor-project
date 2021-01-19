<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><a href="pages-profile.html"><img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"></a>
                <h2 class="h5">Nathan Andrews</h2><span>Web Developer</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="index.html"> <i class="icon-home"></i>Home                             </a></li>




                <li><a href="{{route('admin.levels')}}"> <i class="icon-home"></i>Levels </a></li>
                <li><a href="{{route('admin.grades')}}"> <i class="icon-home"></i>Grades </a></li>
                <li><a href="{{route('admin.faqs')}}"> <i class="icon-home"></i>FAQ's </a></li>
                <li><a href="{{route('admin.subjects')}}"> <i class="icon-home"></i>Subjects </a></li>
                <li><a href="{{route('admin.locations')}}"> <i class="icon-home"></i>Locations </a></li>
                <li><a href="{{route('admin.instruments')}}"> <i class="icon-home"></i>Instruments </a></li>
                <li><a href="{{route('admin.races')}}"> <i class="icon-home"></i>Races </a></li>

                <li><a href="#chartsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bar-chart"></i>Charts </a>
                    <ul id="chartsDropdown" class="collapse list-unstyled ">
                        <li><a href="charts.html">Charts</a></li>
                        <li><a href="charts-gauge-sparkline.html">Gauge + Sparkline</a></li>
                    </ul>
                </li>
                <li><a href="#tablesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-grid"></i>Tables </a>
                    <ul id="tablesDropdown" class="collapse list-unstyled ">
                        <li><a href="tables.html">Bootstrap tables</a></li>
                        <li><a href="tables-datatable.html">Datatable</a></li>
                    </ul>
                </li>
                <li><a href="#componentsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-page"></i>Components </a>
                    <ul id="componentsDropdown" class="collapse list-unstyled ">
                        <li><a href="components-cards.html">Cards</a></li>
                        <li><a href="components-calendar.html">Calendar</a></li>
                        <li><a href="components-gallery.html">Gallery</a></li>
                        <li><a href="components-loading-buttons.html">Loading buttons</a></li>
                        <li><a href="components-map.html">Maps</a></li>
                        <li><a href="components-notifications.html">Notifications</a></li>
                        <li><a href="components-preloader.html">Preloaders</a></li>
                    </ul>
                </li>
                <li><a href="#pagesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Pages </a>
                    <ul id="pagesDropdown" class="collapse list-unstyled ">
                        <li><a href="pages-contacts.html">Contacts</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="login.html">Login page</a></li>
                        <li><a href="login-2.html">Login v.2 <span class="badge badge-info">New</span></a></li>
                        <li><a href="pages-profile.html">Profile</a></li>
                        <li><a href="pages-pricing.html">Pricing table</a></li>
                    </ul>
                </li>
                <li> <a href="#"> <i class="icon-mail"></i>Demo
                        <div class="badge badge-warning">6 New</div></a></li>
            </ul>
        </div>
        <div class="admin-menu">
            <h5 class="sidenav-heading">Second menu</h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
                <li> <a href="#"> <i class="icon-flask"> </i>Demo
                        <div class="badge badge-info">Special</div></a></li>
                <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
                <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
            </ul>
        </div>
    </div>
</nav>
