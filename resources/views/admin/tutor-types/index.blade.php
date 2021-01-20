@extends('admin.layouts.app')
@section('title','Grades')
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Tutor Types       </li>
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
                            <h4>{{isset($subject) ? 'Update Tutor Type':'Add Tutor Type'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.tutor_types')}}">
                                @csrf
                                @isset($type)
                                    <input type="hidden" value="{{$type->id}}" name="type"/>
                                @endisset
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tutor Type </label>
                                            <input type="text" name="title" value="{{isset($type) ? $type->type:''}}" placeholder="Tutor Type " class="form-control">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group" style="padding-top: 30px !important;">
                                            <input type="submit" value="{{isset($type) ? 'Update':'Submit'}}" class="btn btn-primary">
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

                                        <td align="center">Remove </th>
                                        <td align="center">Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($types as $type)
                                        <tr>
                                            <td>{{$type->id}}</td>
                                            <td>{{$type->type}}</td>


                                            <td align="center"><a href="{{route('admin.tutor_types',['action'=>'delete','type'=>$type->id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.tutor_types',['action'=>'update','type'=>$type->id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

