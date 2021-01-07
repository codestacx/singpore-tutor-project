@extends('layouts.app')
@section('title','Site | Home')
@section('content')

    <!-- import modal at the top -->
    @include('layouts.components.modal')
    <!-- modal ends here -->
    <!-- slider starts here -->
    @include('layouts.components.slider')
    <!-- slider ends here -->


    <!-- community-guideline -->
    @include('partials.guidlines')
    <!-- ends here -->

    <!-- stories starts here -->
    @include('partials.stories')
    <!-- stories ends here -->


    <!-- include services -->
    @include('partials.services')
    <!-- services ends here-->

    <!-- include tution rates -->
    @include('partials.tutionrates')
    <!-- end tution rates -->


    <!-- include steps -->
    @include('partials.steps')
    <!-- end steps -->


    <!-- benifits -->
    @include('partials.benifits')
    <!-- end benifits -->
@endsection
