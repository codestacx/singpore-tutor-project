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
                            <h4>{{isset($subject) ? 'Update Subject':'Add Subject'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.subjects')}}">
                                @csrf
                                @isset($subject)
                                    <input type="hidden" value="{{$subject->subject_id}}" name="subject"/>
                                @endisset
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Subject Title</label>
                                            <input type="text" name="title" value="{{isset($subject) ? $subject->subject_title:''}}" placeholder="Subject Title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group" style="padding-top: 30px !important;">
                                            <input type="submit" value="{{isset($subject) ? 'Update':'Submit'}}" class="btn btn-primary">
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
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td>{{$subject->subject_id}}</td>
                                            <td>{{$subject->subject_title}}</td>


                                            <td align="center"><a href="{{route('admin.subjects',['action'=>'delete','subject'=>$subject->subject_id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.subjects',['action'=>'update','subject'=>$subject->subject_id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

