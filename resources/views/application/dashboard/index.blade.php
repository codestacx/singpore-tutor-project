@extends('application.dashboard.layouts.app')
@section('title','Tutor | Welcome')
@section('content')

    <div class="col-lg-8 col-xl-9">
        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>Appointment Detail</h2>
            </div>
            <div class="sl-dashboardbox__content sl-appointment-holder">
                <div class="sl-appointment-profile">
                    <div class="sl-newAppointments__userDetail">
                        <div class="sl-newAppointments__userLogo">
                            <figure>
                                <img src="{{asset('static/images/insight/user/img-01.jpg')}}" alt="Image Description">
                            </figure>
                        </div>
                        <div class="sl-newAppointments__userText">
                            <div class="sl-slider__tags">
                                <span class="sl-bg-green">New</span>
                            </div>
                            <h5><a href="javascript:void(0);">Hubert Yzaguirre</a></h5>
                            <p>Nov 11, @ 11:30am</p>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="btn sl-btn sl-btn-md sl-detailNoti sl-busy-before">Details</a>
                </div>
                <div class="sl-booking-detail">
                    <h5 class="sl-booking-detail__heading">Booking Details</h5>
                    <ul>
                        <li class="sl-booking-detail__content">
                            <div class="sl-booking-detail__title">
                                <h6>Booking Date</h6>
                            </div>
                            <div class="sl-booking-detail__description">
                                <p>Jun 27, 2019</p>
                            </div>
                        </li>
                        <li class="sl-booking-detail__content">
                            <div class="sl-booking-detail__title">
                                <h6>Booking Time</h6>
                            </div>
                            <div class="sl-booking-detail__description">
                                <p>Jul 10, 2019</p>
                            </div>
                        </li>
                        <li class="sl-booking-detail__content">
                            <div class="sl-booking-detail__title">
                                <h6>Comments</h6>
                            </div>
                            <div class="sl-booking-detail__description">
                                <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut laboret
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                        </li>
                        <li class="sl-booking-detail__content">
                            <div class="sl-booking-detail__title">
                                <h6>Requested Services</h6>
                            </div>
                            <div class="sl-booking-detail__description">
                                <ul>
                                    <li><p>Logo Design</p><p>$1920</p></li>
                                    <li><p>Brand Style Guides</p><p>$222</p></li>
                                    <li><p>Game Design</p><p>$16</p></li>
                                    <li><p>Graphics For Streamers</p><p>$50</p></li>
                                </ul>
                            </div>
                        </li>
                        <li class="sl-booking-detail__content">
                            <div class="sl-booking-detail__title">
                                <h6>Repeat Customer</h6>
                            </div>
                            <div class="sl-booking-detail__description">
                                <p>Yes</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sl-appointment-status">
                    <div class="sl-appointment-status__btn">
                        <a href="javascript:void(0);" class="btn sl-btn sl-reject-btn">Reject Request</a>
                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-active sl-btn-small sl-print-btn"><i class="ti-printer"></i></a>
                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-active sl-btn-small sl-share-btn"><i class="ti-share"></i></a>
                    </div>
                    <div class="sl-appointment-status__job">
                        <h6>Job Status :</h6>
                        <div class="sl-userStatus">
                            <div class="sl-userStatus__content">
                                <label>
                                    <select class="form-control sl-form-control">
                                        <option selected>In Process</option>
                                        <option>Completed</option>
                                        <option>Cancelled</option>
                                    </select>
                                </label>
                            </div>
                            <button type="submit" class="btn sl-btn sl-btn-small"><i class="fas fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


