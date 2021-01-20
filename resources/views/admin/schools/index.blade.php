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
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{isset($school) ? 'Update School':'Add School'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.schools')}}">
                                @csrf
                                @isset($school)
                                    <input type="hidden" value="{{$school->id}}" name="school"/>
                                @endisset
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>School Title</label>
                                            <input type="text" name="type" value="{{isset($school) ? $school->type:''}}" placeholder="School Title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group" style="padding-top: 30px !important;">
                                            <input type="submit" value="{{isset($school) ? 'Update':'Submit'}}" class="btn btn-primary">
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
                                    @foreach($schools as $school)
                                        <tr>
                                            <td>{{$school->id}}</td>
                                            <td>{{$school->type}}</td>


                                            <td align="center"><a href="{{route('admin.schools',['action'=>'delete','school'=>$school->id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.schools',['action'=>'update','school'=>$school->id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

