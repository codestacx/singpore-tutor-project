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
                            <h4>{{isset($rate) ? 'Update Rate':'Add Rate'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.rates')}}">
                                @csrf
                                @isset($rate)
                                    <input type="hidden" value="{{$rate->rate_id}}" name="rate"/>
                                @endisset
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Rate </label>
                                            <input type="text" name="title" value="{{isset($rate) ? $rate->rate:''}}" placeholder="Rate in $" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Choose Grade</label>
                                            <select class="form-control" name="grade">
                                                @foreach($grades as $grade)
                                                    <option {{isset($rate) && $rate->grade == $grade->grade_id ? 'selected':''}}  value="{{$grade->grade_id}}">{{$grade->grade_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Choose Category</label>
                                            <select class="form-control" name="category">
                                                @foreach($categories as $category)
                                                    <option {{isset($rate) && $rate->category == $category->id ? 'selected':''}}  value="{{$category->id}}">{{$category->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group" style="padding-top: 30px !important;">
                                            <input type="submit" value="{{isset($rate) ? 'Update':'Submit'}}" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="datatable1" style="width: 100%;" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rate</th>
                                        <th>Grade</th>
                                        <th>Category</th>
                                        <td align="center">Remove </th>
                                        <td align="center">Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rates as $rate)
                                        <tr>
                                            <td>{{$rate->rate_id}}</td>
                                            <td>{{$rate->rate}}</td>
                                            <td>{{$rate->grades->grade_title}}</td>
                                            <td>{{$rate->categories->type}}</td>

                                            <td align="center"><a href="{{route('admin.rates',['action'=>'delete','rate'=>$rate->rate_id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.rates',['action'=>'update','rate'=>$rate->rate_id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

