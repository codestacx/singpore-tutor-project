@extends('layouts.app')
@section('title','Site | Home')
@section('links')

@endsection
@section('content')

    <!-- import modal at the top -->
    @include('layouts.components.modal')
    <!-- modal ends here -->
    <!-- slider starts here -->
    @include('layouts.components.slider')
    <!-- slider ends here -->


    <br/>


    <!-- affordable tution rates -->
    <div class="container" style="background: url(https://res.cloudinary.com/finnhvman/image/upload/v1541930411/pattern.png);">


        <div class="card" style="background-color: antiquewhite;">
            <div style="background: cadetblue;
border-radius: 50%;
width: 20px;
height: 20px;
margin: 10px;
position: absolute;"></div>
            <div class="card-title">
                <h6 style="font-size: 15px;color: coral;text-align: center;"> AFFORDABLE TUITION RATES </h6>
            </div>
            <div style="background: indianred;
border-radius: 50%;
width: 20px;
height: 20px;
margin: 10px;
position: absolute;right:0px;"></div>
            <h3 class="" style="text-align: center;color: cadetblue;font-family: fantasy;">
                Home Tuition Rates Singapore 2021
            </h3>
            <div class="card-body" style="text-align: center">
                <p class="" style="">

                    Our tuition rates are constantly updated based on tuition fees quoted by Home Tutors in Singapore.
                    These home tuition rates are based on the volume of 10,000+ monthly tuition assignment applications over a pool of 30,000+ active home tutors.
                </p>

            </div>


        </div>



        <table class="table table-hover tutionratestable"   style="width: 100%;margin-top: 10px">
            <thead>
            <tr>
                <th style=""></th>
                <th>
                    <img style="border-radius: 50px" src="{{asset('img/part-time-2.webp')}}"/>
                    <div style="background: brown;border-radius: 50%;width: 20px;height: 20px;"></div>
                </th>

                <th>  <div style="background: cadetblue;border-radius: 50%;width: 20px;height: 20px;"></div>
                    <img   src="{{asset('img/full-time-2.webp')}}"/>
                </th>
                <th>  <img  src="{{asset('img/ex-teacher-2.webp')}}"/>

                    <div style="background: turquoise;border-radius: 50%;width: 20px;height: 20px;"></div>

                </th>

            </tr>
            </thead>
            <thead>
            <tr style="font-family: cursive;background-color: lightcoral;color: floralwhite;font-size: 16px;">
                  <th></th>
                <th > Part Time <br/> Tutors</th>
                <th style=""> Full Time <br/> Tutors </th>
                <th style=""> Ex/Current <br/> MOE Teachers</th>

            </tr>
            </thead>


            <tbody>
            <tr style="text-align: center;font-size: 16px;">
                <td style="background-color: mediumaquamarine;font-size: 20px;color: lightcyan;font-weight: inherit;font-family: fantasy;">Pre School</td>
                <td>123</td>
                <td>123</td>
                <td>123</td>
            </tr>
            <tr style="text-align: center">
                <td style="background-color: floralwhite;font-size: 20px;font-weight: inherit;font-family: fantasy;">Pre School</td>
                <td>123</td>
                <td>123</td>
                <td>123</td>
            </tr>
            <tr style="text-align: center">
                <td style="background-color: mediumaquamarine;font-size: 20px;color: lightcyan;font-weight: inherit;font-family: fantasy;">Pre School</td>
                <td>123</td>
                <td>123</td>
                <td>123</td>
            </tr>
            <tr style="text-align: center">
                <td style="background-color: floralwhite;font-size: 20px;font-weight: inherit;font-family: fantasy;">Pre School</td>
                <td>123</td>
                <td>123</td>
                <td>123</td>
            </tr>

            </tbody>
        </table>

    </div>


    <div class="container container-fluid">

        <div class="card" style="background-color: linen;">
            <div style="background: deepskyblue;
border-radius: 50%;
width: 20px;
height: 20px;
margin: 10px;
position: absolute;"></div>
            <h5 class="card-title">
                <span id="circle"></span>  <h6 style="font-size: 15px;color: crimson;text-align: center;"> Tutor Categories </h6>
            </h5>
            <h3 class=""  style="text-align: center;color: deepskyblue;font-family: fantasy;">
                Types of Home Tutors
            </h3>
            <div style="background: darkcyan;
border-radius: 50%;
width: 20px;
height: 20px;
margin: 10px;
position: absolute;right:0px;"></div>
            <div class="card-body" style="text-align: center">
                <small class="">
                    In this section, we help you to understand the 3 main categories of Home Tutors in Singapore. This information will assist you greatly in making the right tutor choice for your needs.
                </small>


            </div>

            <div class="bg-light">
                <table class="table table-hover tutionratestable"   style="width: 100%;margin-top: 10px">
                    <thead>
                    <tr>

                        <th>
                            <img style="border-radius: 50px" src="{{asset('img/part-time-2.webp')}}"/>
                            <div style="background: brown;border-radius: 50%;width: 20px;height: 20px;"></div>
                        </th>

                        <th>  <div style="background: cadetblue;border-radius: 50%;width: 20px;height: 20px;"></div>
                            <img   src="{{asset('img/full-time-2.webp')}}"/>
                        </th>
                        <th>  <img  src="{{asset('img/ex-teacher-2.webp')}}"/>

                            <div style="background: turquoise;border-radius: 50%;width: 20px;height: 20px;"></div>

                        </th>

                    </tr>
                    </thead>
                    <thead>
                    <tr style="font-family: cursive;background-color: lightcoral;color: floralwhite;font-size: 16px;">

                        <th style="background-color: darkcyan;color: floralwhite;" > Part Time <br/> Tutors</th>
                        <th style=""> Full Time <br/> Tutors </th>
                        <th style="font-family: cursive;background-color: crimson;color: floralwhite;font-size: 16px;"> Ex/Current <br/> MOE Teachers</th>

                    </tr>
                    </thead>


                    <tbody>
                    <tr style="text-align: center;font-size: 16px;">

                        <td>Around 1 to 3 <br/>
                            Years of Experience</td>
                        <td>More Than 5 <br/>
                            Years of Experience</td>
                        <td>National Exam Markers <br/>
                            (PSLE/N/O/A Levels, IBDP)</td>
                    </tr>

                    <tr style="text-align: center;font-size: 16px;">

                        <td>Around 1 to 3 <br/>
                            Years of Experience</td>
                        <td>More Than 5 <br/>
                            Years of Experience</td>
                        <td>National Exam Markers <br/>
                            (PSLE/N/O/A Levels, IBDP)</td>
                    </tr>

                    <tr style="text-align: center;font-size: 16px;">

                        <td>Around 1 to 3 <br/>
                            Years of Experience</td>
                        <td>More Than 5 <br/>
                            Years of Experience</td>
                        <td>National Exam Markers <br/>
                            (PSLE/N/O/A Levels, IBDP)</td>
                    </tr>

                    <tr style="text-align: center;font-size: 16px;">

                        <td>Around 1 to 3 <br/>
                            Years of Experience</td>
                        <td>More Than 5 <br/>
                            Years of Experience</td>
                        <td>National Exam Markers <br/>
                            (PSLE/N/O/A Levels, IBDP)</td>
                    </tr>


                    </tbody>
                </table>

            </div>


        </div></div>







    </div>




@endsection


