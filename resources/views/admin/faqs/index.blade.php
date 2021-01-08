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
            <div class="card">

                <div class="card-body">

                    <?php generateFlashMessage(); ?>
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Related</th>
                                <th>Question</th>
                                <th>Answer </th>

                                <th colspan="2">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $faq)
                                <tr>
                                    <td>{{$faq->id}}</td>
                                    <td>{{$faq->faq_title}}</td>
                                    <td>{{$faq->question}}</td>
                                    <td>{{$faq->answer}}</td>
                                    <td><a href="{{route('admin.faqs',['action'=>'delete','faq'=>$faq->id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                    <td><a href="{{route('admin.faqs',['action'=>'update','faq'=>$faq->id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

