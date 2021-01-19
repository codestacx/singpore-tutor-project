@extends('application.dashboard.layouts.app')
@section('title','Tutor | Basic Information')
@section('content')

    <div class="col-lg-8 col-xl-9">
        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>Change Password</h2>
            </div>

            <div>
                @php generateFlashMessage(); @endphp
            </div>
            <div class="sl-dashboardbox__content">

                <form class="sl-form sl-change-password" action="{{route('tutor.account.privacy',['action'=>'change-password'])}}" method="post">
                  @csrf
                    <fieldset>
                        <div class="sl-form__wrap">
                            <div class="form-group form-group-half">
                                <input type="password" class="form-control sl-form-control" name="password" placeholder="New Password*">
                            </div>
                            <div class="form-group form-group-half">
                                <input type="password" class="form-control sl-form-control" name="cpassword" placeholder="Retype Password*">
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
                <form class="sl-form sl-deactivateac" method="post" action="{{route('tutor.account.privacy',['action'=>'deactivate-account'])}}">
                    @csrf
                    <fieldset>
                        <div class="sl-form__wrap">
                            <div class="form-group form-group-half">
                                <input type="password" class="form-control sl-form-control" name="password" placeholder="Enter Password*">
                            </div>
                            <div class="form-group form-group-half">
                                <input type="password" class="form-control sl-form-control" name="cpassword" placeholder="Retype Password*">
                            </div>
                            <div class="form-group">
                                <div class="sl-select">
                                    <select class="form-control sl-form-control" name="reason">
                                        <option hidden="">Select Reason*</option>
                                        <option value="Temporarily disable my account">Temporarily disable my account</option>
                                        <option value="My account was hacked">My account was hacked</option>
                                        <option value="i have a privacy concern">i have a privacy concern</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Description"></textarea>
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
@endsection


