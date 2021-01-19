@extends('application.dashboard.layouts.app')
@section('title','Tutor | Dashboard')
@section('content')

    <div class="col-lg-8 col-xl-9">

        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>Dashboard </h2>
            </div>
            <div class="sl-dashboardbox__content">
                <form class="sl-form sl-deactivateac">
                    <fieldset>
                        <div class="sl-form__wrap">
                            @if($tutor->profile_approved == 0)
                                <div class="alert alert-primary">
                                    Your Profile is currently under processing. We will let you know once you are approved by admin
                                </div>
                                @else
                                <div class="alert alert-success">
                                    Your Profile has been approved successfully by administration
                                </div>
                            @endif
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection


