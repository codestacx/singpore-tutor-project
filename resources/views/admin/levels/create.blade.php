@extends('admin.layouts.app')
@section('title','Grades')
<script type="text/javascript" src="{{asset('assets/js/dashboard.js')}}"></script>
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
                <h1 class="h3 display">Levels</h1>
            </header> --}}


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{isset($level_edit) ? 'Update Level':'Add Level'}}</h4>
                        </div>
                        <?php generateFlashMessage(); ?>
                        <div class="card-body">
                            <form method="post" action="{{route('admin.levels')}}">
                                @csrf
                                @isset($level_edit)
                                    <input type="hidden" value="{{$level_edit->id}}" name="level_id" id="level_id"/>
                                @endisset
                              <div class="row">
                                  <div class="col">
                                    <div class="form-group">
                                        <label>Level Title</label>
                                        <input type="text" name="title" id="title" value="{{isset($level_edit) ? $level_edit->level_title:''}}" placeholder="Level Title" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col">

                                    <div class="form-group">
                                        <label>Level Staus</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option value="1" {{isset($level_edit) ? ($level_edit->active == "1" ? "selected" : ""):''}}>Active</option>
                                            <option value="0" {{isset($level_edit) ? ($level_edit->active == "0" ? "selected" : ""):''}}>In Active</option>
                                        </select>
                                        {{-- <input type="checkbox" class="form-control" style="float: right;" value="1" name="is_active"  checked> --}}
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                         <br>
                                         <input type="submit" id="submit_btn" value="{{isset($level_edit) ? 'Update':'Add Level'}}" class="btn btn-primary btn-lg btn-block">
                                    </div>
                                  </div>
                              </div>
                            </form>
                        </div>

                        <table id="datatable1" style="width: 100%;" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Remove </th>
                                <th>Update</th>
                           </tr>
                            </thead>
                            <tbody>
                            @foreach($levels as $level)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{$level->level_title}}</td>
                                    <td>{{$level->active == "1" ? "Active" : "In Active" }}</td>
                                    <td><a href="{{route('admin.levels',['action'=>'delete','level'=>$level->id])}}"><i  style="color: #b21f2d;cursor:pointer;" class="fa fa-trash"></i> </a> </td>
                                    {{-- <td><a href="#" onclick="update_rec(<?=$level->id?>,'<?=$level->level_title?>','<?=$level->active;?>')"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td> --}}
                                    <td><a href="{{route('admin.levels',['action'=>'update','level'=>$level->id])}}"><i  style="cursor: pointer" class="fa fa-edit"></i> </a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
<script type="text/javascript">

function update_rec(id,title,is_active){

    // var asd = document.getElementById("title");
    // alert(asd);
    // $("#gadget_url").val("");
     //   $("#submit_btn").val('Update');
        // $("#level_id").val(id);
        // $("#title").val(title);
        // $("#is_active").val(is_active);
       // alert(id+"___"+title+"_"+gett);
}
</script>

