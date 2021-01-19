@extends('application.dashboard.layouts.app')
@section('title','Tutor | Notification')
@section('content')

    <div class="col-lg-8 col-xl-9">
        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>All Notifications</h2>
            </div>
            <div class="sl-dashboardbox__content sl-allnotification-holder">
                <ul class="sl-allnotification">
                    <li>
                        <div class="sl-notititle">
                            <h4><a href="javascript:void(0);">Account Activity Alert</a></h4>
                            <span>Jun 27, 2019</span>
                        </div>
                        <div class="sl-notidescription">
                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut <strong> “IP: 192.168.8.1“ </strong>magna aliqua enadime minimve quis nostrud exercitation ullamco <strong>“June 27, 2019”</strong> laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </li>
                    <li>
                        <div class="sl-notititle">
                            <h4><a href="javascript:void(0);">Account Activity Alert</a></h4>
                            <span>Jun 27, 2019</span>
                        </div>
                        <div class="sl-notidescription">
                            <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                    </li>
                    <li class="sl-noti-update">
                        <div class="sl-notititle">
                            <h4><a href="javascript:void(0);">Pasword Updated Successfully</a></h4>
                            <span>Jun 27, 2019</span>
                        </div>
                        <div class="sl-notidescription">
                            <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit ese cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deser mollit anim id est laborum. Sed ut perspiciatis.</p>
                        </div>
                    </li>
                    <li class="sl-noti-update">
                        <div class="sl-notititle">
                            <h4><a href="javascript:void(0);">Photo Updated Successfully</a></h4>
                            <span>Jun 27, 2019</span>
                        </div>
                        <div class="sl-notidescription">
                            <p>unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </li>
                    <li class="sl-noti-update">
                        <div class="sl-notititle">
                            <h4><a href="javascript:void(0);">Details Updated Successfully</a></h4>
                            <span>Jun 27, 2019</span>
                        </div>
                        <div class="sl-notidescription">
                            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                    </li>
                    <li class="sl-noti-update">
                        <div class="sl-notititle">
                            <h4><a href="javascript:void(0);">We Welcome You!</a></h4>
                            <span>Jun 27, 2019</span>
                        </div>
                        <div class="sl-notidescription">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni.</p>
                        </div>
                    </li>
                </ul>
                <div class="sl-pagination">
                    <div class="sl-pagination__button-left">
                        <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span class="lnr lnr-chevron-left"></span></a>
                    </div>
                    <div class="sl-pagination__button-num">
                        <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>1</span></a>
                        <a class="btn sl-btn sl-btn-small sl-btn-active" href="javascript:void(0);"><span>2</span></a>
                        <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>3</span></a>
                        <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>4</span></a>
                        <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span class="sl-more">...</span></a>
                        <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>50</span></a>
                    </div>
                    <div class="sl-pagination__button-right">
                        <a class="btn sl-btn sl-btn-small sl-btn-active" href="javascript:void(0);"><span class="lnr lnr-chevron-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


