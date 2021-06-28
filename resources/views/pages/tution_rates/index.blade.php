@extends('layouts.app')
@section('title','Site | Tution Rates')
<!-- import modal at the top -->
@include('layouts.components.modal',['levels'=>\App\Models\Level::all(),'subjects'=> \App\Models\Subject::all()])
<!-- modal ends here -->
@section('links')
    <link rel="stylesheet" href="{{asset('style/pattern.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/tables.css')}}"/>
@endsection

@section('content')


    {{--    <!-- import modal at the top -->--}}
    {{--    @include('layouts.components.modal')--}}
    {{--    <!-- modal ends here -->--}}
    <!-- slider starts here -->
    @include('layouts.components.slider')
    <!-- slider ends here -->


    <section class="container">


        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>AFFORDABLE TUITION RATES</h6>
                <h3>Home Tuition Rates Singapore 2021</h3>
                <p>Our tuition rates are constantly updated based on tuition fees quoted by Home Tutors in Singapore. These home tuition rates are based on the volume of 10,000+ monthly tuition assignment applications over a pool
                    of 30,000+ active home tutors.</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive-sm table-responsive-lg table-responsive-md table-responsive-xl ">
                <div class="container">
                    <thead>
                    <tr>
                        <th scope=""></th>
                        <th><img src="{{asset('assets/images/2.png')}}" alt="" height="90px" width="90px" class="mb-3"></th>
                        <th><img src="{{asset('assets/images/1.png')}}" alt="" height="90px" width="90px" class="mb-3"></th>
                        <th><img src="{{asset('assets/images/3.png')}}" alt="" height="90px" width="90px" class="mb-3"></th>
                    </tr>
                    </thead>
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2">
                        <th>Pre-School</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>Primary 1-3</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>Primary 4-6</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>Sec 1-2</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>Sec 3-5</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>JC</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>JC</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>IGCSE / International</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>Poly / Uni</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2">
                        <th>Adult</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    </tbody>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container my-5 w-75 rounded">
            <div class="text-center" id="title-table">
                <h6>TUTOR CATEGORIES</h6>
                <h3>Types of Home Tutors</h3>
                <p>In this section, we help you to understand the 3 main categories of Home Tutors in Singapore. This information will assist you greatly
                    in making the right tutor choice for your needs.</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive-sm table-responsive-lg table-responsive-md table-responsive-xl">
                <div class="container">
                    <thead>
                    <tr>
                        <th><img src="images/2.png" alt="" height="150px" class="mb-3"></th>
                        <th><img src="images/1.png" alt="" height="150px" class="mb-3"></th>
                        <th><img src="images/3.png" alt="" height="150px" class="mb-3"></th>
                    </tr>
                    </thead>
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9 !important; color: white;" class="h-100" id="head1">
                        <td>Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td style="background-color: #fd4a55 !important;">Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td style="background-color: #fe9000 !important;">Ex/Current<br>
                            MOE Teachers</td>
                    </tr>
                    <tr  style=" color: black;" id="head3">
                        <td >Around 1 to 3<br>
                            Years of Experience</td>
                        <td>More Than 5<br>
                            Years of Experience
                        </td>
                        <td>National Exam Markers<br>
                            (PSLE/N/O/A Levels, IBDP)</td>
                    </tr>
                    <tr style=" color: black;" id="head4">
                        <td>Made Up of<br>
                            Mostly Undergraduates</td>
                        <td>Made Up of<br>
                            Mostly Graduates</td>
                        <td>MOE & NIE Trained<br>
                            School Teachers</td>
                    </tr>
                    <tr style=" color: black;" id="head3">
                        <td>Scored Good Grades (As)<br>
                            During School Days</td>
                        <td>Large Pool of Students,<br>
                            Relevant Levels & Subjects</td>
                        <td>In-Depth MOE Teaching<br>
                            Techniques & Pedagogy</td>
                    </tr>
                    <tr style=" color: black;" id="head4">
                        <td>Young & Vibrant,<br>
                            Small Age Gap</td>
                        <td>Highly Experienced with<br>
                            All Types of Students </td>
                        <td>Wealth of Classroom<br>
                            Teaching Experience</td>
                    </tr>
                    <tr style=" color: black;" id="head3">
                        <td>Most Budget<br>
                            Friendly Option</td>
                        <td>Highest Level<br>
                            of Commitment</td>
                        <td>Most Qualified<br>
                            Tutor Option</td>
                    </tr>
                    </tbody>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>PRESCHOOL TUITION</h6>
                <h3>Preschool Tuition Rates</h3>
                <p>The tuition rates for Preschool School in Singapore range between $25-$60/hour. The average tuition lesson duration ranges between 1-1.5 hours, depending on the concentration and attention span of the child. Lessons are kept fun and lively with elements
                    of “learning through play” introduced.</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Playgroup</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>N1</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>N2</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>K1</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>K2</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>

                    </tbody>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>PRIMARY SCHOOL TUITION</h6>
                <h3>Primary School Tuition Rates</h3>
                <p>The tuition rates for Primary School in Singapore range between $25-$70/hour. The average tuition lesson duration ranges between 1.5-2 hours. At Lower Primary Levels, tuition lessons are catered towards helping students build a strong foundation for later years. At Upper Primary Levels, tuition lessons tend to be more exam-centric, with timed practices and examination skills taught. As the student draws closer to PSLE, it is natural for tuition frequency and duration to increase for a “last-minute
                    push” towards attaining a better PSLE score.</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>P1</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>p2</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>P3</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>P4</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>P5</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>P6</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>

                    </tbody>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>SECONDARY SCHOOL TUITION</h6>
                <h3>Secondary School Tuition Rates</h3>
                <p>The tuition rates for Secondary School in Singapore range between $30-$90/hour. The average tuition lesson duration ranges between 1.5-2 hours. At Lower Secondary Levels, tuition lessons are catered towards helping students transit smoothly from Primary School, as well as introduce new core subjects whilst building a strong foundation. At Upper Secondary levels, tuition lessons are catered towards helping student prepare well for National Exams such as N & O Levels. It is once again natural for tuition frequency and duration to increase closer to
                    major examination dates such as Prelim, N Levels and O Levels.</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Sec 1</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Sec 3</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Sec 3</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Sec 4</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Sec 5</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    </tbody>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>JC TUITION</h6>
                <h3>JC Tuition Rates</h3>
                <p>The tuition rates for JC in Singapore range between $40-120/hour. The average tuition lesson duration is 2 hours, as there is a huge jump in content to be covered. At JC1, tuition lessons are targeted at helping students transit smoothly from Secondary School, to build strong foundations in their chosen H1 & H2 subjects, and preparing for the Promotional Exams. At JC2, tuition are fully focused on helping students score the best possible grades for A Levels. It is recommended and always the case that tuition frequency
                    and duration increases closer towards the A Levels.
                </p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>JC 1</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>JC 2</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Year 3 (MI)</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>IB TUITION</h6>
                <h3>IB Tuition Rates</h3>
                <p>The tuition rates for IB in Singapore range between $40-120/hour. The average tuition lesson duration is 2 hours. At Year 1 IB, tuition lessons are catered towards helping students familiarize with the grading and examination format of their chosen SL and HL subjects, and the IB curriculum as a whole. At Year 2 IB, tuition lessons are fully focused on helping student score the maximum number of points for the final IBDP exams. Throughout the IB programme, help will also be provided by tutors on the student’s Internal Assessments (IA), Extended Essay (EE) and Theory of Knowledge (TOK).</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>IBDP 1</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>IBDP 2</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>IGCSE / INTERNATIONAL SCHOOL TUITION</h6>
                <h3>IGCSE Tuition Rates</h3>
                <p>The tuition rates for IGCSE in Singapore range between $30-110/hour. The average lesson duration ranges between 1.5-2 hours. For Grades 1 to 6, the lessons are catered towards nurturing interest and helping students build a strong foundation in subjects. For Grade 7 to 10, the lessons are more focused towards preparation for the IGCSE Exams. Students who take the IGCSE exam usually progress to take the IB Exams</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 1</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 2</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 3</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 4</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 5</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 6</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 7</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 8</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 9</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Grade 10</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>POLYTECHNIC / UNIVERSITY TUITION</h6>
                <h3>Polytechnic / University Tuition Rates</h3>
                <p>The tuition rates for Polytechnic and University in Singapore range between $40-$120/hour. The average lesson duration ranges between 1.5-2 hours. Tuition lessons are usually focused on helping students clarify doubts regarding certain modules, or providing
                    guidance in completing certain assignments</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Polytechnic</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                    <tr id="head2-1">
                        <th>University</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                </div>
            </table>
        </section>

        <!-- new -->
        <section class="container-fluid my-5 w-75">
            <div class="text-center" id="title-table">
                <h6>ADULT LANGUAGE TUITION</h6>
                <h3>Adult Language Tuition Rates</h3>
                <p>The tuition rates for Adult Language in Singapore range between $30-90/hour. The average lesson duration ranges between 1.5-2 hours. Tuition lessons are often customized according to proficiency level, and intended goals of the student. Lessons can
                    be conversational-centric, written-centric or even both, based on the student’s desired outcome</p>
            </div>
            <table class="table table-striped text-center border-none table-responsive ">
                <div class="container">
                    <tbody style="border-top: none !important;">
                    <tr style="background-color: #00c6b9; color: white;" class="h-100" id="head1">
                        <td style="background-color: #f5f1f0 !important; color: white; background-image: none !important; border-bottom: none !important;  border: none !important ;"></td>
                        <td >Part-Time<br>
                            &nbsp;&nbsp;Tutors</td>
                        <td >Full-Time<br>
                            &nbsp; &nbsp;Tutors</td>
                        <td >Ex/Current<br>

                            MOE Teachers</td>
                    </tr>
                    <tr id="head2-1">
                        <th>Adult Language</th>
                        <td>$25-$30/h</td>
                        <td>$30-$40/h</td>
                        <td>$50-$60/h</td>
                    </tr>
                </div>
            </table>
        </section>
        <section class="container mt-5 mb-5" style="background-color: #f5f1f0 !important;">
            <div class="row pt-4">
                <div class="col-sm-6">
                    <div class="text-center" id="title-table">
                        <h6>INVESTING IN TUITION FEES</h6>
                        <h3>Why Hire Home Tuition?</h3>
                        <p class="text-dark text-start">Home Tuition is an investment which pays off! As the famous saying goes: “No other investment yields as great a return as the investment in education”.</p>
                        <p class="text-dark text-start">According to todayonline.com, the tuition industry is valued at $1.4 billion today. There has to be a reason why parents in Singapore are willing to spend such a significant amount of money on tuition lessons for their children.</p>
                        <p class="text-dark text-start">Amongst the various tuition options in Singapore, Home Tuition in particular has also proven itself as the preferred option for many parents due to the personalised nature of lessons.</p>
                        <p class="text-dark text-start">As a well-established home tuition agency, we have seen many students and parents reap the benefits of home tuition lessons. Here are 6 strong reasons why parents should hire a home tutor for their child!</p>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <img src="{{asset('img/about-img.png')}}" class="img-fluid" alt="" style="max-height: 400px !important; height: auto !important;">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-6  mb-4">
                        <div class="text-center container" id="title-table">
                            <img src="{{asset('assets/images/expect-icon-1.webp')}}" alt="#" height="50px" class="mb-3">
                            <h5 style="color: #ff9000 !important;">1-to-1 Personalized Attention</h5>
                            <p class="text-dark text-justify">Home Tuition is often conducted in a 1-to-1 session. This means that the student is able to enjoy undivided attention from the tutor, and is also more likely to concentrate as there are less distractions compared to a group setting. Students are also able to clarify every single doubt and learning gap with no pressure from classmates. Furthermore, home tutors are also able to provide customized materials according to the
                                weaknesses of the student.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="text-center container" id="title-table">
                            <img src="{{asset('assets/images/why-hire-2.webp')}}" alt="#" height="50px" class="mb-3">
                            <h5 style="color: #00c6b9 !important;">Custom-Fit and Specialized Maths Materials </h5>
                            <p class="text-dark text-justify">95% of Students in Singapore who have engaged Home Tuition have reported improved academic results. Aside from syllabus teaching, home tutors are also able to provide useful materials and resources such as personalized notes, exam papers and revision materials. Useful skills such as effective time management will also be taught and practiced with students. Students are hence able to score much better for exams due
                                to a combination of these benefits.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="text-center container" id="title-table">
                            <img src="{{asset('assets/images/expect-icon-7.webp')}}" alt="#" height="50px" class="mb-3">
                            <h5 style="color: #fd4a55 !important;">Increased Confidence</h5>
                            <p class="text-dark text-justify">Improved results also naturally lead to an increased confidence level in students who engage home tuition. As the famous saying goes, “Success is like a drug”. Students who achieve academic success tend to be more confident in their abilities to excel in other fields of their life. This could relate
                                to increased performance in their CCA and personal hobbies.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="text-center container" id="title-table">
                            <img src="{{asset('assets/images/why-hire-3.webp')}}" alt="#" height="50px" class="mb-3">
                            <h5 style="color: #ff9000 !important;">Less Stress</h5>
                            <p class="text-dark text-justify">Hiring home tuition allows students to cope with academic demands in an effective and efficient manner. The 1.5 to 3 hours devoted weekly to clarifying doubts with home tutors is well-spent as it allows students to stay on top of their academics. This results in a lower stress levels, and more importantly allows them to enjoy
                                their childhood or teenage years to the fullest.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="text-center container" id="title-table">
                            <img src="{{asset('assets/images/why-hire-5.webp')}}" alt="#" height="50px" class="mb-3">
                            <h5 style="color: #00c6b9 !important;">Better & Wider Future Prospects</h5>
                            <p class="text-dark text-justify">One of the long-term benefits of hiring home tuition would be the increased future prospects of the student. As Singapore is a grade-centric and meritorious society, many local top universities and courses require good academic results as a pre-requisite. Scoring good grades naturally allows students more choices on their schools/courses available, and this in turn allows students to
                                chase the dream career of his or her choice eventually.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="text-center container" id="title-table">
                            <img src="{{asset('assets/images/expect-icon-5.webp')}}" alt="#" height="50px" class="mb-3">
                            <h5 style="color: #fd4a55 !important;">Convinient & Safe Environment</h5>
                            <p class="text-dark text-justify">Convenience and safety are 2 of the most overlooked benefits of hiring home tuition. As home tuition is often conducted at the comfort of home, this means that both students and parents are able to save on unnecessary time and cost travelling. This allows much more flexibility to pursue other family activities. Furthermore as the tuition is conducted at home, parents need not worry about the safety of their child as they are in a
                                safe and comfortable learning environment.</p>
                        </div>
                    </div>
                </div>
        </section>

        <section class="container my-5">
            <div class="row">
                <div class="col-sm-6 mb-5">
                    <div class="text-center container">
                        <img src="{{asset('assets/images/classst.webp')}}" alt="" style="max-height: 400px; min-height: auto;" class="pt-5 img-fluid">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="text-center container" id="title-table">
                        <h6>FINANCIAL ASSISTANCE</h6>
                        <h3>Affordable Tuition Options for <br>Low-Income Families</h3>
                        <p class="text-dark text-start">This section is for parents who are from low-income families and have difficulty affording the home tuition rates listed above. Do give our friendly team a call or text at 9695 3522 and we will do our best within your budget. We strongly believe that every family in Singapore should be able to receive quality academic help and tuition,
                            and we will do our best to help you on a case-by-case basis.</p>
                        <p class="text-dark text-start">Alternatively, there are several organisations under the Collaborative Tuition Programme (CTP) who will be able to provide you with assistance. These are namely the CDAC (Chinese Development Assistance Council), SINDA (Singapore Indian Development Association) and Yaya Mendaki. Do kindly note that to participate in these programmes, you’ll require to provide proof
                            and documents that you are from a low-income family.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container my-5">
            <div class="row">
                <div class="col-sm-4">
                    <div id="border-dot" class="text-left py-3 my-3  container">
                        <h6 style="color: #ff9000 !important">CDAC Tuition Programme</h6>
                        <p>Locations: Over 50+<br> Locations Islandwide,<br>
                            Levels: Primary &<br> Secondary<br> & JC + Scholarships<br>
                            Tuition Fees: $10 –<br> $60/month onwards</p>
                        <a href="" class="btn text-uppercase" style="background-color: #ff9000 !important;
                  color: white;">Website</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="border-dot" class="text-left py-3 my-3  container" style="border: 3px dashed #00c6b9;">
                        <h6 style="color: #00c6b9 !important">CDAC Tuition Programme</h6>
                        <p>Locations: Over 50+<br> Locations Islandwide,<br>
                            Levels: Primary &<br> Secondary<br> & Tertiary Levels (TTFS)<br>
                            Tuition Fees: $135 –<br> $210/month onwards</p>
                        <a href="" class="btn text-uppercase" style="background-color: #00c6b9 !important;
                  color: white;">Website</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="border-dot" class="text-left py-3 my-3  container" style="border: 3px dashed #fd4a55;">
                        <h6 style="color: #fd4a55 !important">CDAC Tuition Programme</h6>
                        <p>Locations: Over 50+<br> Locations Islandwide,<br> Online Classes Available<br>
                            Levels: Primary &<br> Secondary<br>
                            Tuition Fees: $80 –<br> $120/month onwards</p>
                        <a href="" class="btn text-uppercase" style="background-color: #fd4a55 !important;
                  color: white;">Website</a>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <div class="container pattern-cross-dots-md bg-warning"
         style="color: #b21f2d;border-radius: 15px;background-image: url({{asset('img/dark-bg.webp')}})">

        <div style="text-align: center;text-transform: uppercase">
            <h6 style="font-size: 14px;
font-weight: 800;
text-transform: uppercase;
color: #ff9000;padding: 16px;"> Finding The Right Home Tutor</h6>
            <h3 style="font-size: 20px;
color: black;">Important Qualities to Look For In A Home Tutor</h3>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8" style="margin: auto">
            <div class="accordions" id="accordion" role="tablist" aria-multiselectable="true">

                <!-- Single Accordian Area -->
                <div class="panel single-accordion rates-faqs-section">
                    <h6><a style="  background: #ff9000;
    color: #fff !important;
    font-size: 16px;
    font-weight: 600;
    padding: 20px !important;" role="button" class="collapsed" aria-expanded="true" aria-controls="collapseOne"
                           data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Can I just enroll in a
                            single course? I'm not interested in the entire Specialization?
                            <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        </a></h6>
                    <div id="collapseOne" class="accordion-content collapse show">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis fringilla tortor.</p>
                    </div>
                </div>

                <!-- Single Accordian Area -->
                <div class="panel single-accordion ">
                    <h6>
                        <a role="button" style="  background: #ff9000;
    color: #fff !important;
    font-size: 16px;
    font-weight: 600;
    padding: 20px !important;" class="collapsed" aria-expanded="true" aria-controls="collapseTwo"
                           data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">What is the refund
                            policy?
                            <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        </a>
                    </h6>
                    <div id="collapseTwo" class="accordion-content collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper
                            finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                            vulputate id justo quis facilisis.</p>
                    </div>
                </div>

                <!-- Single Accordian Area -->
                <div class="panel single-accordion rates-faqs-section">
                    <h6>
                        <a role="button" style="  background: #ff9000;
    color: #fff !important;
    font-size: 16px;
    font-weight: 600;
    padding: 20px !important;" aria-expanded="true" aria-controls="collapseThree" class="collapsed"
                           data-parent="#accordion" data-toggle="collapse" href="#collapseThree">What background
                            knowledge is necessary?
                            <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        </a>
                    </h6>
                    <div id="collapseThree" class="accordion-content collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper
                            finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                            vulputate id justo quis facilisis.</p>
                    </div>
                </div>

                <!-- Single Accordian Area -->
                <div class="panel single-accordion rates-faqs-section">
                    <h6>
                        <a style="  background: #ff9000;
    color: #fff !important;
    font-size: 16px;
    font-weight: 600;
    padding: 20px !important;" role="button" aria-expanded="true" aria-controls="collapseFour" class="collapsed"
                           data-parent="#accordion" data-toggle="collapse" href="#collapseFour">Do i need to take the
                            courses in a specific order?
                            <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        </a>
                    </h6>
                    <div id="collapseFour" class="accordion-content collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper
                            finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                            vulputate id justo quis facilisis.</p>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
@endsection


