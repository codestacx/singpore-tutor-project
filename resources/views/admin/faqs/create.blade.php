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
                <h1 class="h3 display">FAQ's</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{isset($faq) ? 'Update Faq':'Add FAQ'}}</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                            <form method="post" action="{{route('admin.faqs')}}">
                                @csrf
                                @isset($faq)
                                    <input type="hidden" value="{{$faq->id}}" name="faq"/>
                                @endisset
                                <div class="form-group">
                                    <label>What Question ?</label>
                                    <input type="text" name="question" value="{{isset($faq) ? $faq->question:''}}" placeholder="FAQ Question" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Choose Category</label>
                                    <select class="form-control" name="faq_cat_id">
                                        @foreach($categories as $category)
                                            <option {{isset($faq) && $category->id == $faq->faq_cat_id ? 'selected':''}}  value="{{$category->id}}">{{$category->faq_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Add Answer</label>
                                    <textarea class="form-control" name="answer">{{isset($faq) ? $faq->answer:''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{isset($faq) ? 'Update':'Submit'}}" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

