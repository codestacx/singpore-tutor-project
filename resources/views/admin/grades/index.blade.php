@extends('admin.layouts.app')
@section('title','Grades')
@section('content')


    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Table       </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Data Table            </h1>
            </header>
            <div class="card">

                <div class="card-body">

                    <?php generateFlashMessage(); ?>
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Level</th>
                                <th>Remove </th>
                                <th>Update</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grades as $grade)
                                <tr>
                                    <td>{{$grade->grade_id}}</td>
                                    <td>{{$grade->grade_title}}</td>
                                    <td>{{$grade->level_title}}</td>
                                    <td><a href="{{route('admin.grades',['action'=>'delete','grade'=>$grade->grade_id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                    <td><a href="{{route('admin.grades',['action'=>'update','grade'=>$grade->grade_id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('scripts')
        <!-- Data Tables-->
        <script src="{{asset('admin/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/js/tables-datatable.js')}}"></script>
        <!-- Main File-->

    @endsection
@endsection

