<div class="col-lg-4 col-xl-3">
    <aside id="sl-asidebar" class="sl-asidebar">
        <div class="sl-asideholder sl-dashboardAsideholder">
            <a href="javascript:void(0);" id="sl-closeasidebar" class="sl-closeasidebar">
                <i class="lnr lnr-layers"></i>
            </a>
            <div class="sl-asidescrollbar">
                <div id="sl-sidebarwrapper" class="sl-sidebarwrapper">
                    <div class="sl-usersinfo">
                        <div class="single-chart">
                            <svg viewBox="0 0 36 36" class="circular-chart orange">
                                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                <path class="circle"
                                      stroke-dasharray="90, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            </svg>
                            <figure class="sl-userprofileimg">
                                <img style="width: 90px;height: 90px" src="<?= (($tutor->basicinfo) && $tutor->basicinfo->profile_image !=null) ? asset('profiles/'.$tutor->name.'/'.$tutor->basicinfo->profile_image):asset('img/tutor-avatar.jpg') ?>" alt="img description">
                            </figure>
                            <span class="sl-percentage">Teacher</span>
                        </div>
                        <div class="sl-title">
                            <div class="sl-slider__tags">
                                <span class="sl-bg-red-orange">Featured</span><span class="sl-bg-green">Verified</span>
                            </div>
                            <h3><a href="javascript:void(0);"><?=$tutor->name?></a></h3>
                            <div class="sl-featureRating">
                                <span class="sl-featureRating__stars"><span></span></span>
                                <em>(1642 Feedback)</em>
                            </div>
                        </div>
                    </div>
                    <nav id="sl-navdashboard" class="sl-navdashboard">
                        <ul>
                            <li>
                                <a href="{{route('tutor.profile.basic_info')}}">
                                    <i class="ti-dashboard"></i><span>Basic Information</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tutor.profile.education_info')}}">
                                    <i class="ti-dashboard"></i><span>Educational Information</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tutor.profile.experience_info')}}">
                                    <i class="ti-dashboard"></i><span>Experience Information</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tutor.profile.preference_info')}}">
                                    <i class="ti-dashboard"></i><span>Preferences</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('tutor.profile.document_info')}}">
                                    <i class="ti-dashboard"></i><span>Documents</span>
                                </a>
                            </li>

                            <li class="menu-item-has-children page_item_has_children sl-active">
                                <a href="javascript:void(0);" class="sl-notification sl-noticolor1">
                                    <i class="ti-star"></i><span>Manage Appointments</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="dashboard-appointment-single.html">Appointment Single</a></li>
                                    <li><a href="dashboard-all-appointment.html">All Appointment</a></li>
                                    <li><a href="dashboard-manage-time-slots.html">Manage Time Slots</a></li>
                                    <li><a href="dashboard-manage-services.html">Manage Services &amp; Prices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="dashboard-profile-settings.html">
                                    <i class="ti-user"></i><span>Profile Settings</span>
                                </a>
                            </li>
                            <li class="menu-item-has-children page_item_has_children">
                                <a href="javascript:void(0);">
                                    <i class="ti-bookmark-alt"></i><span>Manage Articles</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="dashboard-article-list.html">Articles List</a></li>
                                    <li><a href="dashboard-add-new-article.html">Add New Articles</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="dashboard-inbox.html">
                                    <i class="ti-email"></i><span>inbox</span>
                                </a>
                            </li>
                            <li class="menu-item-has-children page_item_has_children">
                                <a href="javascript:void(0);">
                                    <i class="ti-layers"></i><span>Packages &amp; Payouts</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="dashboard-buy-package.html">Packages</a></li>
                                    <li><a href="dashboard-all-payouts.html">Payouts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="dashboard-my-favorites.html">
                                    <i class="ti-heart"></i><span>My Favorites</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-notifications.html">
                                    <i class="ti-bell"></i><span>Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-accountprivacy.html">
                                    <i class="ti-lock"></i><span>Account &amp; Privacy</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html">
                                    <i class="ti-key"></i><span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="sl-sidebar-ad">
                    <a href="javascript:void(0);"><img src="images/service-provider-single/ad.jpg" alt="Image Description"></a>
                    <p>Advertisement<span>255px X 355px</span></p>
                </div>
            </div>
        </div>
    </aside>
</div>
