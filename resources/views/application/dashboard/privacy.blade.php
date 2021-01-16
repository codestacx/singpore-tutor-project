@extends('application.layouts.app')
@section('title','Privacy')
@section('links')
    <link rel="stylesheet" href="{{asset('static/css/dashboard.css')}}">
@endsection
@section('content')
    <!-- MAIN START -->
    <main class="sl-main">
        <div class="sl-main-section">
            <div class="container">
                <div class="row">
                  @include('application.dashboard.layouts.sidebar',['user'=>$user])
                    <div class="col-lg-8 col-xl-9">
                        <div class="sl-dashboardbox">
                            <div class="sl-dashboardbox__title">
                                <h2>Change Password</h2>
                            </div>
                            <div class="sl-dashboardbox__content">
                                <form class="sl-form sl-change-password">
                                    <fieldset>
                                        <div class="sl-form__wrap">
                                            <div class="form-group form-group-half">
                                                <input type="password" class="form-control sl-form-control" placeholder="New Password*">
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input type="password" class="form-control sl-form-control" placeholder="Retype Password*">
                                            </div>
                                            <div class="form-group sl-manageTimeSlots__btn">
                                                <button type="submit" class="btn sl-btn">Save Changes</button>
                                                <p>Click “Save Changes” to update latest changes made</p>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="sl-dashboardbox">
                            <div class="sl-dashboardbox__title">
                                <h2>Account &amp; Privacy Settings</h2>
                            </div>
                            <div class="sl-dashboardbox__content">
                                <form class="sl-form sl-privacy-form">
                                    <fieldset>
                                        <div class="sl-form__wrap">
                                            <div class="form-group form-group-half">
                                                <div class="sl-on-off">
                                                    <input type="checkbox" id="hide-on" name="contact_form" checked="">
                                                    <label for="hide-on"><i></i></label>
                                                    <span>Make my profile public</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <div class="sl-on-off">
                                                    <input type="checkbox" id="hide-on2" name="contact_form" checked="">
                                                    <label for="hide-on2"><i></i></label>
                                                    <span>Make my profile searchable</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <div class="sl-on-off">
                                                    <input type="checkbox" id="hide-on3" name="contact_form">
                                                    <label for="hide-on3"><i></i></label>
                                                    <span>Share my profile photo</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <div class="sl-on-off">
                                                    <input type="checkbox" id="hide-on4" name="contact_form">
                                                    <label for="hide-on4"><i></i></label>
                                                    <span>Disable my account temporarily</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <div class="sl-on-off">
                                                    <input type="checkbox" id="hide-on5" name="contact_form" checked="">
                                                    <label for="hide-on5"><i></i></label>
                                                    <span>Show my client feedback</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <div class="sl-on-off">
                                                    <input type="checkbox" id="hide-on6" name="contact_form">
                                                    <label for="hide-on6"><i></i></label>
                                                    <span>Enable/ Disable</span>
                                                </div>
                                            </div>
                                            <div class="form-group sl-manageTimeSlots__btn">
                                                <button type="submit" class="btn sl-btn">Save Changes</button>
                                                <p>Click “Save Changes” to update latest changes made</p>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="sl-dashboardbox">
                            <div class="sl-dashboardbox__title">
                                <h2>Deactivate Account</h2>
                            </div>
                            <div class="sl-dashboardbox__content">
                                <form class="sl-form sl-deactivateac">
                                    <fieldset>
                                        <div class="sl-form__wrap">
                                            <div class="form-group form-group-half">
                                                <input type="password" class="form-control sl-form-control" placeholder="Enter Password*">
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input type="password" class="form-control sl-form-control" placeholder="Retype Password*">
                                            </div>
                                            <div class="form-group">
                                                <div class="sl-select">
                                                    <select class="form-control sl-form-control">
                                                        <option hidden="">Select Reason*</option>
                                                        <option>Temporarily disable my account</option>
                                                        <option>My account was hacked</option>
                                                        <option>i have a privacy concern</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea id="sl-tinymceeditor" class="sl-tinymceeditor" placeholder="Description"></textarea>
                                            </div>
                                            <div class="form-group sl-manageTimeSlots__btn">
                                                <button type="submit" class="btn sl-btn">Deactivate</button>
                                                <p>Click “Deactivate” to shutdown account</p>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN END -->
@endsection
@section('scripts')
    <script src="{{asset('static/js/vendor/tinymce/tinymce.min.js%3FapiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci')}}"></script>
@endsection
