@extends('admin.layouts.app')
@section('title','Grades')
@section('content')

    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Tutors       </li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Tutors</h1>
            </header>
            <?php  generateFlashMessage() ?>
            <div class="row">

                @foreach($tutors as $tutor)
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center"><span style="background-image: url('{{asset('profiles/'.$tutor->name.'/'.$tutor->basicinfo->profile_image)}}')" class="avatar avatar-xl mr-3">

                                    </span>
                                    <div class="media-body overflow-hidden">
                                        @if($tutor->profile_approved == 1)
                                            <span class="badge badge-primary">approved</span>
                                        @else
                                            <span class="badge badge-danger">pending</span>
                                        @endif
                                        <h5 class="card-text mb-0">{{$tutor->name}}</h5>
                                        <p class="card-text text-uppercase">Tutor</p>
                                        <p class="card-text">

                                            {{$tutor->email}}<br><abbr title="Phone">P:  </abbr>{{$tutor->basicinfo->mobile}}
                                        </p>

                                    </div>

                                </div><a href="{{route('admin.tutors',['id'=>$tutor->id])}}" class="tile-link"></a>
                            </div>
                        </div>
                    </div>

                    @endforeach


            </div>
        </div>
    </section>

@endsection

