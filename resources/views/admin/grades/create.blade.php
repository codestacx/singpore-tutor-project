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
                            <h4>{{isset($grade) ? 'Update Grade':'Add Grade'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.grades')}}">
                                @csrf
                                @isset($grade)
                                    <input type="hidden" value="{{$grade->grade_id}}" name="grade"/>
                                @endisset
                                <div class="row">
                                    <div class="col">
                                            <div class="form-group">
                                                <label>Grade Title</label>
                                                <input type="text" name="title" value="{{isset($grade) ? $grade->grade_title:''}}" placeholder="Grade Title" class="form-control">
                                            </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Choose Level</label>
                                            <select class="form-control" name="level">
                                                @foreach($levels as $level)
                                                    <option {{isset($grade) && $grade->level_id == $level->id ? 'selected':''}}  value="{{$level->id}}">{{$level->level_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group" style="padding-top: 30px !important;">
                                            <input type="submit" value="{{isset($grade) ? 'Update':'Submit'}}" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="datatable1" style="width: 100%;" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Level</th>
                                        <td align="center">Remove </th>
                                        <td align="center">Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($grades as $grade)
                                        <tr>
                                            <td>{{$grade->grade_id}}</td>
                                            <td>{{$grade->grade_title}}</td>
                                            <td>{{$grade->level_title}}</td>
                                            <td align="center"><a href="{{route('admin.grades',['action'=>'delete','grade'=>$grade->grade_id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.grades',['action'=>'update','grade'=>$grade->grade_id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

