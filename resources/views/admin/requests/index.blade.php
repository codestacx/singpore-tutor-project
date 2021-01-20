@extends('admin.layouts.app')
@section('title','School')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Schools       </li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <!-- Page Header-->
            {{-- <header>
                <h1 class="h3 display">Grades</h1>
            </header> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Phone</th>

                                <td align="center">View </th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{$request->tutor_request_id}}</td>
                                    <td>{{$request->fname.' '.$request->lname}}</td>
                                    <td>{{$request->email}}</td>
                                    <td>{{$request->phone}}</td>


                                    <td align="center"><a href="{{route('admin.tutor_requests',['id'=>$request->tutor_request_id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-arrow">&rarr;</i> </a> </td>


                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

