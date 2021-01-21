@extends('admin.layouts.app')
@section('title','Grades')
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
                            <h4> All Assignments </h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">

                         @isset($assignment)
                                <form method="post" action="{{route('admin.tution_assignments')}}">
                                    @csrf

                                    <div class="row">

                                        @isset($assignment)
                                            <input type="hidden" name="assignment" value="{{$assignment->assignment_id}}"/>
                                        @endisset
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-12">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Choose Status</label>

                                                    <select class="form-control" name="status">
                                                        <option <?php isset($assignment)  && $assignment->active == 1 ? 'selected':''  ?> value="1">Active</option>
                                                        <option <?php isset($assignment)  && $assignment->active == 0 ? 'selected':''  ?> value="0">Review</option>
                                                        <option <?php isset($assignment)  && $assignment->active == -1 ? 'selected':''  ?> value="-1">Closed</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Choose Category</label>
                                                    <select class="form-control" name="category">
                                                        <option <?php isset($assignment)  && $assignment->category =='Urgent' ? 'selected':''  ?> value="Urgent">Urgent</option>
                                                        <option <?php isset($assignment)  && $assignment->category =='Featured' ? 'selected':''  ?>  value="Featured">Featured</option>
                                                        <option <?php isset($assignment)  && $assignment->category =='Regular' ? 'selected':''  ?> value="Regular">Regular</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Choose Location 123</label>
                                                    <select class="form-control" name="location">

                                                        @foreach($locations as $location)
                                                            <option disabled style="color: deepskyblue">
                                                                {{$location->location_title}}
                                                            </option>
                                                            @foreach($location->places as $place)
                                                                <option <?php isset($assignment)  && $assignment->location == $place->id ? 'selected':''  ?>  value="{{$place->id}}">{{$place->place}}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-lg-12 col-md-12">
                                            <label>Detailed Requirements</label>
                                            <textarea   class="form-control" name="description">
                                            @isset($assignment)
                                                    {{$assignment->description}}
                                                @endisset
                                        </textarea>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="form-group" style="padding-top: 30px !important;">
                                                <input type="submit" value="Update" class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            @endisset

                            <div class="table-responsive">
                                <table id="datatable1" style="width: 100%;" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>Status</th>
                                        <th>Category</th>
                                        <th>Requirement</th>

                                        <td align="center">Remove </th>
                                        <td align="center">Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($assignments as $assignment)
                                        <tr>
                                            <td>{{$assignment->assignment_id}}</td>
                                            <td>@if($assignment->active == 1)
                                                   Active
                                                @elseif($assignment->active == 0)
                                                    Review
                                                    @else
                                                  Closed
                                                    @endif
                                                    </td>
                                            <td>{{$assignment->category}}</td>
                                            <td>{{$assignment->description}}</td>


                                            <td align="center"><a href="{{route('admin.tution_assignments',['action'=>'delete','assignment'=>$assignment->assignment_id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.tution_assignments',['action'=>'update','assignment'=>$assignment->assignment_id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

