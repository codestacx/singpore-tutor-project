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
                                <th> Name</th>
                                <th> Area Code</th>
                                <th> Charges </th>
                                <th><i class="fa fa-envelope fa-1x" style="color: deepskyblue"></i> </th>
                                <th><i class="fa fa-phone" style="color: #2cdd9b"></i></th>

                                <td> Status </td>


                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{$request->tutor_request_id}}</td>
                                    <td>{{$request->fname.' '.$request->lname}}</td>
                                    <td>{{$request->area}}</td>
                                    <td>{{$request->rate}} $</td>
                                    <td>{{$request->email}}</td>
                                    <td>{{$request->phone}}</td>


                                    <td><span style="border-radius: 10px;padding: 5px" class="{{$status ? 'badge badge-success':'badge badge-primary'}}">{{$status ? 'Created':'Pending'}}</span> </td>


                                </tr>




                            </tbody>
                        </table>

                        <br/>
                        <form method="post" action="{{route('admin.tution_assignments')}}">
                            @csrf
                            <ul class="social-links list-inline mb-0 mt-2" style="text-align: right">
                                <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-times"></i></a></li>
                            </ul>
                            <div class="row">

                              <div class="form-group">
                                  <input type="hidden" name="request_id"  value="{{$request->tutor_request_id}}"/>
                              </div>
                            </div>
                            <div class="row">
                                <div class="form-row col-12">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Choose Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Review</option>
                                                <option value="-1">Closed</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Choose Category</label>
                                            <select class="form-control" name="category">
                                                <option value="Urgent">Urgent</option>
                                                <option value="Featured">Featured</option>
                                                <option value="Regular">Regular</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row col-12">

                                    <div class="col">
                                        <div class="form-group">
                                            <label>Choose Location</label>
                                            <select class="form-control" name="location">
                                              @foreach($locations as $location)
                                                  <option disabled style="color: deepskyblue">
                                                      {{$location->location_title}}
                                                  </option>
                                                  @foreach($location->places as $place)
                                                      <option <?php isset($request)  && $request->location == $place->id ? 'selected':''  ?> value="{{$place->id}}">{{$place->place}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Code</label>
                                            <input type="text" name="code" readonly class="form-control" value="{{$code}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-lg-12 col-md-12">
                                    <label>Detailed Requirements</label>
                                    <textarea  class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group col-sm-4">
                                    <div class="form-group" style="padding-top: 30px !important;">
                                        <input type="submit" value="Create" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </div>
                        </form>


                        <h4> Subjects & Grades </h4>
                        <table id="datatable1" style="width: 100%;" class="table table-hover">
                            <caption style="text-align: right"><h4> Created at <span style="color: deepskyblue">{{\Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</span></h4></caption>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Grade</th>
                                <th>Subjects </th>



                            </tr>
                            </thead>
                            <tbody>

                            @foreach($requests as $req)
                                <tr>

                                     <td>{{$req->id}}</td>
                                    <td>{{$req->grade_title}}</td>
                                    <td>
                                        <div class="form-row col-sm-12">
                                        @foreach($req->subject_names as $name)
                                                <div class="col-2">
                                                    <span style="font-size: 16px;"><i class="fa fa-check" style="color: #2cdd9b"></i>&nbsp;{{$name}}</span>
                                                </div>
                                        @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>


                        <h4> Additional Requirements </h4>
                        <div class="card">

                            <div class="card-body" style="padding: 10px">
                                <p  style="padding: 10px;margin: 10px">
                                    {{$request->description}}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

