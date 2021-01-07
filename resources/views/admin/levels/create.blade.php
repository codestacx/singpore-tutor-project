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
                <h1 class="h3 display">Levels</h1>
            </header>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{isset($level_edit) ? 'Update Level':'Add Level'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.levels')}}">
                                @csrf
                                @isset($level_edit)
                                    <input type="hidden" value="{{$level_edit->id}}" name="level_id"/>
                                @endisset
                                <div class="form-group">
                                    <label>Level Title</label>
                                    <input type="text" name="title" value="{{isset($level_edit) ? $level_edit->level_title:''}}" placeholder="Grade Title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Level Staus</label>
                                    <input type="checkbox" class="form-control" style="float: right;" value="1" name="is_active" {{isset($level_edit) ? ($level_edit->active == "1" ? "checked" : ""):''}} checked>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{isset($level_edit) ? 'Update':'Submit'}}" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

