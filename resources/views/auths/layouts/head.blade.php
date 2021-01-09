<aside class="sidebar">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">

        <div class="profile">
            <img src="{{asset('auth-user/images/person_4.jpg')}}" alt="Image" class="img-fluid">
            <h3 class="name">Craig David</h3>
            <span class="country">Web Designer</span>
        </div>


        <div class="nav-menu">
            <ul>
                <li class="accordion">
                    <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                        <span class="icon-home mr-3"></span>Feed
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                        <div>
                            <ul>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Sport</a></li>
                                <li><a href="#">Health</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="accordion">
                    <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                        <span class="icon-search2 mr-3"></span>Explore
                    </a>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                        <div>
                            <ul>
                                <li><a href="#">Interior</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Travel</a></li>
                            </ul>
                        </div>
                    </div>

                </li>
                <li><a href="#"><span class="icon-notifications mr-3"></span>Notifications</a></li>
                <li><a href="#"><span class="icon-location-arrow mr-3"></span>Direct</a></li>
                <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li>
                <li><a href="#"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
            </ul>
        </div>
    </div>

</aside>
