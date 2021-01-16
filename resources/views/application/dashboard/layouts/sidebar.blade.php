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

                                <img style="width: 95px;height: 95px" src="{{ asset(isset($user) ? 'uploads/profile/'.$user->profile->photo : 'raw/user-avatar.jpg')}}" alt="img description">
                            </figure>
                            <span class="sl-percentage">80% Profile Completed</span>
                        </div>
                        <div class="sl-title">
                            <div class="sl-slider__tags">
                                <span class="sl-bg-red-orange">Featured</span><span class="sl-bg-green">Verified</span>
                            </div>
                            <h3><a href="javascript:void(0);"> {{isset($user) ?? $user->fname.' '.$user->lname}}</a></h3>
                            <div class="sl-featureRating">
                                <span class="sl-featureRating__stars"><span></span></span>
                                <em>(1642 Feedback)</em>
                            </div>
                            <div class="sl-userStatus">
                                <div class="sl-userStatus__content">
                                    <a data-toggle="collapse" href="dashboard-insight.html#collapseUser" role="button" aria-expanded="false">
                                        I’m:<span><em class="sl-online"></em></span><em>Online</em><i class="ti-angle-down"></i>
                                    </a>
                                    <div class="collapse" id="collapseUser">
                                        <a href="javascript:void(0);"><span class="sl-online"></span><em>Online</em></a>
                                        <a href="javascript:void(0);"><span class="sl-away"></span><em>Away</em></a>
                                        <a href="javascript:void(0);"><span class="sl-busy"></span><em>Busy</em></a>
                                        <a href="javascript:void(0);"><span class="sl-offline"></span><em>Offline</em></a>
                                    </div>
                                </div>
                                <button type="submit" class="btn sl-btn sl-btn-small"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </div>
                    <nav id="sl-navdashboard" class="sl-navdashboard">
                        <ul>
                            <li class="sl-active">
                                <a href="{{route('app.dashboard.ads')}}">
                                    <i class="ti-dashboard"></i><span> My Ads </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('app.dashboard.profile')}}">
                                    <i class="ti-user"></i><span>Profile Settings</span>
                                </a>
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
                                <a href="{{route('app.privacy')}}">
                                    <i class="ti-lock"></i><span>Account &amp; Privacy</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('app.logout')}}">
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
