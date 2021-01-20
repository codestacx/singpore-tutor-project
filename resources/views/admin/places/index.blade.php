@extends('admin.layouts.app')
@section('title','Places')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Forms       </li>
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
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{isset($place) ? 'Update Place':'Add Place'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.places')}}">
                                @csrf
                                @isset($place)
                                    <input type="hidden" value="{{$place->id}}" name="place"/>
                                @endisset
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Place Title</label>
                                            <input type="text" name="title" value="{{isset($place) ? $place->place:''}}" placeholder="Place Title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Choose Level</label>
                                            <select class="form-control" name="location">
                                                @foreach($locations as $location)
                                                    <option {{isset($place) && $place->location == $location->id ? 'selected':''}}  value="{{$location->location_id}}">{{$location->location_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group" style="padding-top: 30px !important;">
                                            <input type="submit" value="{{isset($place) ? 'Update':'Submit'}}" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="datatable1" style="width: 100%;" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Place</th>
                                        <th>Location</th>
                                        <td align="center">Remove </th>
                                        <td align="center">Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($places as $place)
                                        <tr>
                                            <td>{{$place->id}}</td>
                                            <td>{{$place->place}}</td>
                                            <td>{{$place->location_title}}</td>

                                            <td align="center"><a href="{{route('admin.places',['action'=>'delete','place'=>$place->id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.places',['action'=>'update','place'=>$place->id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

