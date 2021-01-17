@extends('application.dashboard.layouts.app')
@section('title','Tutor | Preferences')
@section('content')

    <div class="col-lg-8 col-xl-9">
        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>Availabiity</h2>
            </div>
            <div class="sl-dashboardbox__content sl-manageTimeSlots">
                @php generateFlashMessage();@endphp
                <span class="sl-manageTimeSlots__form sl-form">
                    @csrf
                    <fieldset>
                        <div class="sl-form__wrap">
                            <div class="form-group form-group-half">
                                <label>
                                    I am available to take tuition at... *
                                </label>
                            </div>

                            <div class="row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="availability_at_student_home" type="checkbox" id="student_house" value="1">
                                    <label class="form-check-label" for="student_house">Student House</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="toggleTutorHomeInfoSection()" name="availability_at_tutor_home" type="checkbox" id="own_house" value="1">
                                    <label class="form-check-label"  for="own_house">My Own House or Centre</label>
                                </div>
                            </div>



                            <div class="row" id="my_home_information" style="display: none">
                                <div class="form-group ">
                                <label>
                                    <input type="text" value="" name="tutor_home_postal" placeholder="Enter location postal code" class="form-control sl-form-control">

                                </label>
                            </div>
                            <div class="form-group ">
                                <label>
                                    <textarea name="class_criteria" placeholder="What can students expect for classes at my location:"  class="form-control sl-form-control"></textarea>
                                </label>
                                <small>e.g. Group size? Material cost? Are trial lessons free/chargeable? Classroom with whiteboard? etc</small>

                            </div>
                            </div>

                        </div>
                    </fieldset>
                </span>

            </div>
        </div>
        <div class="sl-dashboardbox">
            <div class="sl-dashboardbox__title">
                <h2>Locations</h2>
            </div>
            <div class="sl-dashboardbox__content sl-manageTimeSlots">

                <span class="sl-manageTimeSlots__form sl-form" >
                    @csrf
                    <fieldset>
                        @foreach($locations as $location)
                            <h5 style="color: deepskyblue">{{$location->location_title}}</h5>
                            <div class="sl-form__wrap">

                                @foreach($location->places as $place)
                            <div class="form-group form-group-half">
                                <label>
                                   <input  type="checkbox" name="location[]"  value="{{$place->id}}"> {{$place->place}}
                                </label>
                            </div>
                                @endforeach
                        </div>

                        @endforeach

                    </fieldset>
                </span>

            </div>
        </div>


@endsection

        <script>
            function toggleTutorHomeInfoSection(){
                var e = document.getElementById('my_home_information');
                if(e.style.display === 'none'){
                    e.style.display = '';
                }else{
                    e.style.display = 'none';
                }

            }
        </script>

