@extends('layouts.app')
@section('title','Site | Home')
@section('links')
    <link rel="stylesheet" href="{{asset('auth-user/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('auth-user/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('wizard/assets/css/bd-wizard.css')}}">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="{{asset('assets/css/switch.css')}}"/>


@endsection
@section('content')

    @include('tutor.layouts.sidebar')
    <main>
        <div class="site-section">
                   <div class="container">
                       @if ($user->profile_approved == 0)
                           <div class="alert alert-success" style="margin-top: 20px">
                               Please wait while your profile is approved by admin
                           </div>

                       @endif
                   </div>
        </div>


    </main>
@endsection
@section('scripts')
    <script src="{{asset('auth-user/js/main.js')}}"></script>
@endsection

