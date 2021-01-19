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
                            <h4>{{isset($grade) ? 'Update FAQ':'Add FAQ'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.faqs')}}">
                                @csrf
                                @isset($faq)
                                    <input type="hidden" value="{{$faq->_id}}" name="faq"/>
                                @endisset
                                <div class="row">
                                    <div class="form-row col-12">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>FAQ Question</label>
                                                <input type="text" name="question" value="{{isset($faq) ? $faq->question:''}}" placeholder="FAQ Question" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Choose Category</label>
                                                <select class="form-control" name="faq_cat_id">
                                                    @foreach($categories as $category)
                                                        <option @isset($faq)
                                                                    @if ($category->id == $faq->faq_cat_id)
                                                                        selected
                                                                    @endif
                                                                @endisset
                                                                value="{{$category->id}}">{{$category->faq_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-8 col-md-8">
                                        <label>Answer</label>
                                        <textarea  class="form-control" name="answer">{{isset($faq) ? $faq->answer:''}}</textarea>
                                    </div>
                                   <div>
                                       <div class="col">
                                           <div class="form-group" style="padding-top: 30px !important;">
                                               <input type="submit" value="{{isset($faq) ? 'Update':'Submit'}}" class="btn btn-primary">
                                           </div>
                                       </div>
                                   </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="datatable1" style="width: 100%;" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Category</th>
                                        <td align="center">Remove </th>
                                        <td align="center">Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faqs as $faq)
                                        <tr>
                                            <td>{{$faq->_id}}</td>
                                            <td>{{$faq->question}}</td>
                                            <td>{{$faq->answer}}</td>
                                            <td>{{$faq->faq_title}}</td>
                                            <td align="center"><a href="{{route('admin.faqs',['action'=>'delete','faq'=>$faq->_id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                            <td align="center"><a href="{{route('admin.faqs',['action'=>'update','faq'=>$faq->_id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>

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

