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
            <header>
                <h1 class="h3 display">Grades</h1>
            </header>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{isset($grade) ? 'Update Grade':'Add Grade'}}</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                            <form method="post" action="{{route('admin.grades')}}">
                                @csrf
                                @isset($grade)
                                    <input type="hidden" value="{{$grade->grade_id}}" name="grade"/>
                                @endisset
                                <div class="form-group">
                                    <label>Grade Title</label>
                                    <input type="text" name="title" value="{{isset($grade) ? $grade->grade_title:''}}" placeholder="Grade Title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Choose Level</label>
                                    <select class="form-control" name="level">
                                        @foreach($levels as $level)
                                            <option {{isset($grade) && $grade->level_id == $level->id ? 'selected':''}}  value="{{$level->id}}">{{$level->level_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{isset($grade) ? 'Update':'Submit'}}" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

