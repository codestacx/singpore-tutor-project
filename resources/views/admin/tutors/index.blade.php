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
            <div class="row">
                @foreach($tutors as $tutor)
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center"><span style="background-image: url('{{asset('profiles/'.$tutor->name.'/'.$tutor->basicinfo->profile_image)}}')" class="avatar avatar-xl mr-3"></span>
                                    <div class="media-body overflow-hidden">

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

                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-1.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Margret Cote</h5>
                                    <p class="card-text text-uppercase">Zilidium</p>
                                    <p class="card-text">

                                        margretcote@zilidium.com<br><abbr title="Phone">P:  </abbr>+1 (893) 532-2218
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-2.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Rachel Vinson</h5>
                                    <p class="card-text text-uppercase">Chorizon</p>
                                    <p class="card-text">

                                        rachelvinson@chorizon.com<br><abbr title="Phone">P:  </abbr>+1 (891) 494-2060
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-3.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Gabrielle Aguirre</h5>
                                    <p class="card-text text-uppercase">Comverges</p>
                                    <p class="card-text">

                                        gabrielleaguirre@comverges.com<br><abbr title="Phone">P:  </abbr>+1 (805) 459-3869
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-4.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Spears Collier</h5>
                                    <p class="card-text text-uppercase">Remold</p>
                                    <p class="card-text">

                                        spearscollier@remold.com<br><abbr title="Phone">P:  </abbr>+1 (910) 555-2436
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-5.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Keisha Thomas</h5>
                                    <p class="card-text text-uppercase">Euron</p>
                                    <p class="card-text">

                                        keishathomas@euron.com<br><abbr title="Phone">P:  </abbr>+1 (958) 405-3392
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-6.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Elisabeth Key</h5>
                                    <p class="card-text text-uppercase">Netagy</p>
                                    <p class="card-text">

                                        elisabethkey@netagy.com<br><abbr title="Phone">P:  </abbr>+1 (900) 421-2096
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-7.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Patel Mack</h5>
                                    <p class="card-text text-uppercase">Zedalis</p>
                                    <p class="card-text">

                                        patelmack@zedalis.com<br><abbr title="Phone">P:  </abbr>+1 (800) 460-2720
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-8.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Erika Whitaker</h5>
                                    <p class="card-text text-uppercase">Uniworld</p>
                                    <p class="card-text">

                                        erikawhitaker@uniworld.com<br><abbr title="Phone">P:  </abbr>+1 (911) 484-3333
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-9.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Meyers Swanson</h5>
                                    <p class="card-text text-uppercase">Candecor</p>
                                    <p class="card-text">

                                        meyersswanson@candecor.com<br><abbr title="Phone">P:  </abbr>+1 (999) 404-3297
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-10.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Townsend Sloan</h5>
                                    <p class="card-text text-uppercase">Rameon</p>
                                    <p class="card-text">

                                        townsendsloan@rameon.com<br><abbr title="Phone">P:  </abbr>+1 (978) 563-2964
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center"><span style="background-image: url({{asset('img/avatar-11.jpg')}})" class="avatar avatar-xl mr-3"></span>
                                <div class="media-body overflow-hidden">
                                    <h5 class="card-text mb-0">Millicent Henry</h5>
                                    <p class="card-text text-uppercase">Balooba</p>
                                    <p class="card-text">

                                        millicenthenry@balooba.com<br><abbr title="Phone">P:  </abbr>+1 (863) 585-3988
                                    </p>
                                </div>
                            </div><a href="pages-profile.html" class="tile-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

