@extends('layouts.app')
@section('title','Site | Home')
@section('links')
    <link rel="stylesheet" href="{{asset('auth-user/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('auth-user/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('wizard/assets/css/bd-wizard.css')}}">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="{{asset('assets/css/switch.css')}}"/>


@endsection
@section('content')

    @include('tutor.layouts.sidebar')
    <main>
        <div class="site-section">
            <div class="container">
                <br/>
                <form>
                    <div id="wizard">
                        <h3>
                            <div class="media">
                                <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
                                <div class="media-body">
                                    <div class="bd-wizard-step-title">Basic Info</div>
                                </div>
                            </div>
                        </h3>
                        <section>
                            <div class="content-wrapper">

                                <div class="row" style="margin-top: 10px;padding: 20px;">
                                    <div class="col-sm-12 col-md-10 col-lg-10 "  style="margin: auto" >
                                        <div class="contact-form-wizard">

                                            <div class="card" >
                                                <div class="card-body">

                                                    <div class="row">


                                                        <div class="col-md-12 col-sm-12 col-lg-12" style="text-align: center">
                                                            <h5 style="color: cadetblue;font-family: fantasy;padding: 5px 5px 1px 1px;text-align: center"> What status belongs you ? </h5>
                                                        </div>
                                                        <div class="col-lg-12" style="margin: auto;text-align: center">

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tutorrole" id="fulltimestudent" value="Full Time Student">
                                                                <label class="form-check-label" for="fulltimestudent">
                                                                    Full Time Student
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tutorrole" id="moeschoolteacher" value="MOE School Teacher">
                                                                <label class="form-check-label" for="moeschoolteacher">
                                                                    MOE School Teacher
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tutorrole" id="fulltimetutor" value="Full Time">
                                                                <label class="form-check-label" for="fulltimetutor">
                                                                    Full Time Tutor
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tutorrole" id="parttimetutor" value="Part Time">
                                                                <label class="form-check-label" for="parttimetutor">
                                                                    Part Time Tutor
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12" id="related_sections">

                                                        <div  id="fulltimestudent" style="">
                                                            <div class="col-md-6 col-lg-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="student_status" class="mt-4">Please Specify</label>
                                                                    <select name="student_status" id="student_status" class="custom-select custom-select-sm">
                                                                        <option value="Current Poly Student">Current Poly Student</option>
                                                                        <option value="Current Undergraduate">Current Undergraduate</option>
                                                                        <option value="Current Postgraduate">Current Postgraduate</option>
                                                                        <option value="Others">NIE Trainee</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4 ml-15">
                                                                    <div class="form-group codestacx">
                                                                        <label> Are you NIE-trained ? </label>
                                                                        <br/>
                                                                        <label class="codestacx-switch switch-left-right">
                                                                            <input class="switch-input" type="checkbox">
                                                                            <span class="switch-label" data-on="No" data-off="Yes"></span> <span class="switch-handle"></span> </label>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-sm col-md-7 col-lg-7">
                                                                     <div class="form-group">
                                                                         <label for="highest_qualification" class="mt-4">What's your highest qualification attained</label>
                                                                         <select name="highest_qualification" id="highest_qualification" class="custom-select custom-select-sm">
                                                                             @foreach($qualifications as $qualification)
                                                                                 <option value="{{$qualification->qu_id}}">{{$qualification->qualification}}</option>
                                                                                 @endforeach
                                                                         </select>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                        </div>

                                                        <div class="row" id="moeschoolteacher" style="display: none">
                                                            moe
                                                        </div>

                                                        <div class="row" id="fulltimetutor" style="display: none">full time tu</div>

                                                        <div class="row" id="parttimetutor" style="display: none">part tut</div>

                                                    </div>


                                                    <div class="col-sm-12 col-lg-12 col-md-12 col-12" id="content_cards" >
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="card">
                                                                <!-- Visible portion in collapsed state -->
                                                                <div class="card-header" id="headingOne">
                                                                    <h2 class="mb-0">
                                                                        <!-- no data-toggle, data-target,
                                                                            aria-expanded, aria-controls
                                                                            attributes are used -->
                                                                        <!-- The toggling functionality is lost -->
                                                                        <button class="btn btn-link" type="button">
                                                                            Collapsible Item 1
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <!-- Content to be displayed in open state -->
                                                                <!-- data-parent attribute removed so that
                                                                    the cards are not dependent on each other -->
                                                                <div id="collapseOne" class="collapse show"
                                                                     aria-labelledby="headingOne">
                                                                    <div class="card-body">
                                                                        <input type="text" value="atif"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>

                                                    <div onclick="commonServer.addCollapseSection('accordionExample')" class="col-sm-8 col-lg-6 col-md-6" style="margin: 20px;cursor: pointer">
                                                        <span style="font-size: 15px;"> <i style="color: red;font-size: 15px;" class="fa fa-plus 2x"></i> Add a new School/Course record</span>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div >

                                </div>




{{--                                <div class="row" style="margin-top: 10px;padding: 20px;">--}}
{{--                                    <div class="col-sm-12 col-md-10 col-lg-10 "  style="margin: auto" >--}}
{{--                                        <div class="contact-form-wizard">--}}

{{--                                            <div class="card" >--}}
{{--                                                <div class="card-body">--}}

{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="fullname">Full Name</label>--}}
{{--                                                                <input type="text" name="fullname" class="form-control" id="fullname"   placeholder="e.g Muhammad Atif Akram">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="gender"> Choose Gender</label>--}}
{{--                                                                <select class="form-control" id="gender" name="gender">--}}

{{--                                                                    <option value="Male">Male</option>--}}
{{--                                                                    <option value="Female">Female</option>--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}

{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="mobile">Mobile # <code><small> ( to get SMS when matched to assignments )</small></code></label>--}}
{{--                                                                <input type="tel" name="mobile" class="form-control"  id="mobile"  placeholder="+65 xxx xxx xxxx">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="birth_year"> Birth Year <code><small> YYY format (e.g. 1980).</small></code></label>--}}
{{--                                                                <select class="form-control" name="birth_year" id="birth_year">--}}

{{--                                                                    @php--}}
{{--                                                                        $year = 2020;--}}
{{--                                                                        for(;$year > 1960; $year--){--}}
{{--                                                                    @endphp--}}
{{--                                                                    <option value="{{$year}}">{{$year}}</option>--}}
{{--                                                                    @php--}}
{{--                                                                     }--}}
{{--                                                                    @endphp--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="postal_code"> Postal Code <code><small> (Must be valid to get notification )</small></code></label>--}}
{{--                                                                <input type="tel" id="postal_code" name="postal_code" class="form-control"   placeholder="Postal Code ">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="race">Choose Race</label>--}}
{{--                                                                <select class="form-control" id="race" name="race">--}}
{{--                                                                    @foreach($races as $race)--}}
{{--                                                                        <option value="{{$race->title}}">{{$race->title}}</option>--}}
{{--                                                                    @endforeach--}}

{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}

{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="birth_year">Birth Country </label>--}}
{{--                                                                <select class="form-control" id="birth_year" name="country">--}}
{{--                                                                    <option disabled selected>  Birth Country</option>--}}
{{--                                                                    <option value="Afganistan">Afghanistan</option>--}}
{{--                                                                    <option value="Albania">Albania</option>--}}
{{--                                                                    <option value="Algeria">Algeria</option>--}}
{{--                                                                    <option value="American Samoa">American Samoa</option>--}}
{{--                                                                    <option value="Andorra">Andorra</option>--}}
{{--                                                                    <option value="Angola">Angola</option>--}}
{{--                                                                    <option value="Anguilla">Anguilla</option>--}}
{{--                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>--}}
{{--                                                                    <option value="Argentina">Argentina</option>--}}
{{--                                                                    <option value="Armenia">Armenia</option>--}}
{{--                                                                    <option value="Aruba">Aruba</option>--}}
{{--                                                                    <option value="Australia">Australia</option>--}}
{{--                                                                    <option value="Austria">Austria</option>--}}
{{--                                                                    <option value="Azerbaijan">Azerbaijan</option>--}}
{{--                                                                    <option value="Bahamas">Bahamas</option>--}}
{{--                                                                    <option value="Bahrain">Bahrain</option>--}}
{{--                                                                    <option value="Bangladesh">Bangladesh</option>--}}
{{--                                                                    <option value="Barbados">Barbados</option>--}}
{{--                                                                    <option value="Belarus">Belarus</option>--}}
{{--                                                                    <option value="Belgium">Belgium</option>--}}
{{--                                                                    <option value="Belize">Belize</option>--}}
{{--                                                                    <option value="Benin">Benin</option>--}}
{{--                                                                    <option value="Bermuda">Bermuda</option>--}}
{{--                                                                    <option value="Bhutan">Bhutan</option>--}}
{{--                                                                    <option value="Bolivia">Bolivia</option>--}}
{{--                                                                    <option value="Bonaire">Bonaire</option>--}}
{{--                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>--}}
{{--                                                                    <option value="Botswana">Botswana</option>--}}
{{--                                                                    <option value="Brazil">Brazil</option>--}}
{{--                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>--}}
{{--                                                                    <option value="Brunei">Brunei</option>--}}
{{--                                                                    <option value="Bulgaria">Bulgaria</option>--}}
{{--                                                                    <option value="Burkina Faso">Burkina Faso</option>--}}
{{--                                                                    <option value="Burundi">Burundi</option>--}}
{{--                                                                    <option value="Cambodia">Cambodia</option>--}}
{{--                                                                    <option value="Cameroon">Cameroon</option>--}}
{{--                                                                    <option value="Canada">Canada</option>--}}
{{--                                                                    <option value="Canary Islands">Canary Islands</option>--}}
{{--                                                                    <option value="Cape Verde">Cape Verde</option>--}}
{{--                                                                    <option value="Cayman Islands">Cayman Islands</option>--}}
{{--                                                                    <option value="Central African Republic">Central African Republic</option>--}}
{{--                                                                    <option value="Chad">Chad</option>--}}
{{--                                                                    <option value="Channel Islands">Channel Islands</option>--}}
{{--                                                                    <option value="Chile">Chile</option>--}}
{{--                                                                    <option value="China">China</option>--}}
{{--                                                                    <option value="Christmas Island">Christmas Island</option>--}}
{{--                                                                    <option value="Cocos Island">Cocos Island</option>--}}
{{--                                                                    <option value="Colombia">Colombia</option>--}}
{{--                                                                    <option value="Comoros">Comoros</option>--}}
{{--                                                                    <option value="Congo">Congo</option>--}}
{{--                                                                    <option value="Cook Islands">Cook Islands</option>--}}
{{--                                                                    <option value="Costa Rica">Costa Rica</option>--}}
{{--                                                                    <option value="Cote DIvoire">Cote DIvoire</option>--}}
{{--                                                                    <option value="Croatia">Croatia</option>--}}
{{--                                                                    <option value="Cuba">Cuba</option>--}}
{{--                                                                    <option value="Curaco">Curacao</option>--}}
{{--                                                                    <option value="Cyprus">Cyprus</option>--}}
{{--                                                                    <option value="Czech Republic">Czech Republic</option>--}}
{{--                                                                    <option value="Denmark">Denmark</option>--}}
{{--                                                                    <option value="Djibouti">Djibouti</option>--}}
{{--                                                                    <option value="Dominica">Dominica</option>--}}
{{--                                                                    <option value="Dominican Republic">Dominican Republic</option>--}}
{{--                                                                    <option value="East Timor">East Timor</option>--}}
{{--                                                                    <option value="Ecuador">Ecuador</option>--}}
{{--                                                                    <option value="Egypt">Egypt</option>--}}
{{--                                                                    <option value="El Salvador">El Salvador</option>--}}
{{--                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>--}}
{{--                                                                    <option value="Eritrea">Eritrea</option>--}}
{{--                                                                    <option value="Estonia">Estonia</option>--}}
{{--                                                                    <option value="Ethiopia">Ethiopia</option>--}}
{{--                                                                    <option value="Falkland Islands">Falkland Islands</option>--}}
{{--                                                                    <option value="Faroe Islands">Faroe Islands</option>--}}
{{--                                                                    <option value="Fiji">Fiji</option>--}}
{{--                                                                    <option value="Finland">Finland</option>--}}
{{--                                                                    <option value="France">France</option>--}}
{{--                                                                    <option value="French Guiana">French Guiana</option>--}}
{{--                                                                    <option value="French Polynesia">French Polynesia</option>--}}
{{--                                                                    <option value="French Southern Ter">French Southern Ter</option>--}}
{{--                                                                    <option value="Gabon">Gabon</option>--}}
{{--                                                                    <option value="Gambia">Gambia</option>--}}
{{--                                                                    <option value="Georgia">Georgia</option>--}}
{{--                                                                    <option value="Germany">Germany</option>--}}
{{--                                                                    <option value="Ghana">Ghana</option>--}}
{{--                                                                    <option value="Gibraltar">Gibraltar</option>--}}
{{--                                                                    <option value="Great Britain">Great Britain</option>--}}
{{--                                                                    <option value="Greece">Greece</option>--}}
{{--                                                                    <option value="Greenland">Greenland</option>--}}
{{--                                                                    <option value="Grenada">Grenada</option>--}}
{{--                                                                    <option value="Guadeloupe">Guadeloupe</option>--}}
{{--                                                                    <option value="Guam">Guam</option>--}}
{{--                                                                    <option value="Guatemala">Guatemala</option>--}}
{{--                                                                    <option value="Guinea">Guinea</option>--}}
{{--                                                                    <option value="Guyana">Guyana</option>--}}
{{--                                                                    <option value="Haiti">Haiti</option>--}}
{{--                                                                    <option value="Hawaii">Hawaii</option>--}}
{{--                                                                    <option value="Honduras">Honduras</option>--}}
{{--                                                                    <option value="Hong Kong">Hong Kong</option>--}}
{{--                                                                    <option value="Hungary">Hungary</option>--}}
{{--                                                                    <option value="Iceland">Iceland</option>--}}
{{--                                                                    <option value="Indonesia">Indonesia</option>--}}
{{--                                                                    <option value="India">India</option>--}}
{{--                                                                    <option value="Iran">Iran</option>--}}
{{--                                                                    <option value="Iraq">Iraq</option>--}}
{{--                                                                    <option value="Ireland">Ireland</option>--}}
{{--                                                                    <option value="Isle of Man">Isle of Man</option>--}}
{{--                                                                    <option value="Israel">Israel</option>--}}
{{--                                                                    <option value="Italy">Italy</option>--}}
{{--                                                                    <option value="Jamaica">Jamaica</option>--}}
{{--                                                                    <option value="Japan">Japan</option>--}}
{{--                                                                    <option value="Jordan">Jordan</option>--}}
{{--                                                                    <option value="Kazakhstan">Kazakhstan</option>--}}
{{--                                                                    <option value="Kenya">Kenya</option>--}}
{{--                                                                    <option value="Kiribati">Kiribati</option>--}}
{{--                                                                    <option value="Korea North">Korea North</option>--}}
{{--                                                                    <option value="Korea Sout">Korea South</option>--}}
{{--                                                                    <option value="Kuwait">Kuwait</option>--}}
{{--                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>--}}
{{--                                                                    <option value="Laos">Laos</option>--}}
{{--                                                                    <option value="Latvia">Latvia</option>--}}
{{--                                                                    <option value="Lebanon">Lebanon</option>--}}
{{--                                                                    <option value="Lesotho">Lesotho</option>--}}
{{--                                                                    <option value="Liberia">Liberia</option>--}}
{{--                                                                    <option value="Libya">Libya</option>--}}
{{--                                                                    <option value="Liechtenstein">Liechtenstein</option>--}}
{{--                                                                    <option value="Lithuania">Lithuania</option>--}}
{{--                                                                    <option value="Luxembourg">Luxembourg</option>--}}
{{--                                                                    <option value="Macau">Macau</option>--}}
{{--                                                                    <option value="Macedonia">Macedonia</option>--}}
{{--                                                                    <option value="Madagascar">Madagascar</option>--}}
{{--                                                                    <option value="Malaysia">Malaysia</option>--}}
{{--                                                                    <option value="Malawi">Malawi</option>--}}
{{--                                                                    <option value="Maldives">Maldives</option>--}}
{{--                                                                    <option value="Mali">Mali</option>--}}
{{--                                                                    <option value="Malta">Malta</option>--}}
{{--                                                                    <option value="Marshall Islands">Marshall Islands</option>--}}
{{--                                                                    <option value="Martinique">Martinique</option>--}}
{{--                                                                    <option value="Mauritania">Mauritania</option>--}}
{{--                                                                    <option value="Mauritius">Mauritius</option>--}}
{{--                                                                    <option value="Mayotte">Mayotte</option>--}}
{{--                                                                    <option value="Mexico">Mexico</option>--}}
{{--                                                                    <option value="Midway Islands">Midway Islands</option>--}}
{{--                                                                    <option value="Moldova">Moldova</option>--}}
{{--                                                                    <option value="Monaco">Monaco</option>--}}
{{--                                                                    <option value="Mongolia">Mongolia</option>--}}
{{--                                                                    <option value="Montserrat">Montserrat</option>--}}
{{--                                                                    <option value="Morocco">Morocco</option>--}}
{{--                                                                    <option value="Mozambique">Mozambique</option>--}}
{{--                                                                    <option value="Myanmar">Myanmar</option>--}}
{{--                                                                    <option value="Nambia">Nambia</option>--}}
{{--                                                                    <option value="Nauru">Nauru</option>--}}
{{--                                                                    <option value="Nepal">Nepal</option>--}}
{{--                                                                    <option value="Netherland Antilles">Netherland Antilles</option>--}}
{{--                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>--}}
{{--                                                                    <option value="Nevis">Nevis</option>--}}
{{--                                                                    <option value="New Caledonia">New Caledonia</option>--}}
{{--                                                                    <option value="New Zealand">New Zealand</option>--}}
{{--                                                                    <option value="Nicaragua">Nicaragua</option>--}}
{{--                                                                    <option value="Niger">Niger</option>--}}
{{--                                                                    <option value="Nigeria">Nigeria</option>--}}
{{--                                                                    <option value="Niue">Niue</option>--}}
{{--                                                                    <option value="Norfolk Island">Norfolk Island</option>--}}
{{--                                                                    <option value="Norway">Norway</option>--}}
{{--                                                                    <option value="Oman">Oman</option>--}}
{{--                                                                    <option value="Pakistan">Pakistan</option>--}}
{{--                                                                    <option value="Palau Island">Palau Island</option>--}}
{{--                                                                    <option value="Palestine">Palestine</option>--}}
{{--                                                                    <option value="Panama">Panama</option>--}}
{{--                                                                    <option value="Papua New Guinea">Papua New Guinea</option>--}}
{{--                                                                    <option value="Paraguay">Paraguay</option>--}}
{{--                                                                    <option value="Peru">Peru</option>--}}
{{--                                                                    <option value="Phillipines">Philippines</option>--}}
{{--                                                                    <option value="Pitcairn Island">Pitcairn Island</option>--}}
{{--                                                                    <option value="Poland">Poland</option>--}}
{{--                                                                    <option value="Portugal">Portugal</option>--}}
{{--                                                                    <option value="Puerto Rico">Puerto Rico</option>--}}
{{--                                                                    <option value="Qatar">Qatar</option>--}}
{{--                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>--}}
{{--                                                                    <option value="Republic of Serbia">Republic of Serbia</option>--}}
{{--                                                                    <option value="Reunion">Reunion</option>--}}
{{--                                                                    <option value="Romania">Romania</option>--}}
{{--                                                                    <option value="Russia">Russia</option>--}}
{{--                                                                    <option value="Rwanda">Rwanda</option>--}}
{{--                                                                    <option value="St Barthelemy">St Barthelemy</option>--}}
{{--                                                                    <option value="St Eustatius">St Eustatius</option>--}}
{{--                                                                    <option value="St Helena">St Helena</option>--}}
{{--                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>--}}
{{--                                                                    <option value="St Lucia">St Lucia</option>--}}
{{--                                                                    <option value="St Maarten">St Maarten</option>--}}
{{--                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>--}}
{{--                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>--}}
{{--                                                                    <option value="Saipan">Saipan</option>--}}
{{--                                                                    <option value="Samoa">Samoa</option>--}}
{{--                                                                    <option value="Samoa American">Samoa American</option>--}}
{{--                                                                    <option value="San Marino">San Marino</option>--}}
{{--                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>--}}
{{--                                                                    <option value="Saudi Arabia">Saudi Arabia</option>--}}
{{--                                                                    <option value="Senegal">Senegal</option>--}}
{{--                                                                    <option value="Seychelles">Seychelles</option>--}}
{{--                                                                    <option value="Sierra Leone">Sierra Leone</option>--}}
{{--                                                                    <option value="Singapore">Singapore</option>--}}
{{--                                                                    <option value="Slovakia">Slovakia</option>--}}
{{--                                                                    <option value="Slovenia">Slovenia</option>--}}
{{--                                                                    <option value="Solomon Islands">Solomon Islands</option>--}}
{{--                                                                    <option value="Somalia">Somalia</option>--}}
{{--                                                                    <option value="South Africa">South Africa</option>--}}
{{--                                                                    <option value="Spain">Spain</option>--}}
{{--                                                                    <option value="Sri Lanka">Sri Lanka</option>--}}
{{--                                                                    <option value="Sudan">Sudan</option>--}}
{{--                                                                    <option value="Suriname">Suriname</option>--}}
{{--                                                                    <option value="Swaziland">Swaziland</option>--}}
{{--                                                                    <option value="Sweden">Sweden</option>--}}
{{--                                                                    <option value="Switzerland">Switzerland</option>--}}
{{--                                                                    <option value="Syria">Syria</option>--}}
{{--                                                                    <option value="Tahiti">Tahiti</option>--}}
{{--                                                                    <option value="Taiwan">Taiwan</option>--}}
{{--                                                                    <option value="Tajikistan">Tajikistan</option>--}}
{{--                                                                    <option value="Tanzania">Tanzania</option>--}}
{{--                                                                    <option value="Thailand">Thailand</option>--}}
{{--                                                                    <option value="Togo">Togo</option>--}}
{{--                                                                    <option value="Tokelau">Tokelau</option>--}}
{{--                                                                    <option value="Tonga">Tonga</option>--}}
{{--                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>--}}
{{--                                                                    <option value="Tunisia">Tunisia</option>--}}
{{--                                                                    <option value="Turkey">Turkey</option>--}}
{{--                                                                    <option value="Turkmenistan">Turkmenistan</option>--}}
{{--                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>--}}
{{--                                                                    <option value="Tuvalu">Tuvalu</option>--}}
{{--                                                                    <option value="Uganda">Uganda</option>--}}
{{--                                                                    <option value="United Kingdom">United Kingdom</option>--}}
{{--                                                                    <option value="Ukraine">Ukraine</option>--}}
{{--                                                                    <option value="United Arab Erimates">United Arab Emirates</option>--}}
{{--                                                                    <option value="United States of America">United States of America</option>--}}
{{--                                                                    <option value="Uraguay">Uruguay</option>--}}
{{--                                                                    <option value="Uzbekistan">Uzbekistan</option>--}}
{{--                                                                    <option value="Vanuatu">Vanuatu</option>--}}
{{--                                                                    <option value="Vatican City State">Vatican City State</option>--}}
{{--                                                                    <option value="Venezuela">Venezuela</option>--}}
{{--                                                                    <option value="Vietnam">Vietnam</option>--}}
{{--                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>--}}
{{--                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>--}}
{{--                                                                    <option value="Wake Island">Wake Island</option>--}}
{{--                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>--}}
{{--                                                                    <option value="Yemen">Yemen</option>--}}
{{--                                                                    <option value="Zaire">Zaire</option>--}}
{{--                                                                    <option value="Zambia">Zambia</option>--}}
{{--                                                                    <option value="Zimbabwe">Zimbabwe</option>--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-12 col-lg-6">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="citizenship">Choose Citizenship</label>--}}
{{--                                                                <select class="form-control" name="citizenship" id="citizenship">--}}
{{--                                                                    @foreach($citizenships as $citizenship)--}}
{{--                                                                        <option value="{{$citizenship->name}}">{{$citizenship->name}}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                    <option value="Others">Others</option>--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div >--}}

{{--                                </div>--}}

                            </div>
                        </section>
                        <h3>
                            <div class="media">
                                <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
                                <div class="media-body">
                                    <div class="bd-wizard-step-title">Employ Details</div>
                                    <div class="bd-wizard-step-subtitle">Step 2</div>
                                </div>
                            </div>
                        </h3>
                        <section>
                            <div class="content-wrapper">
                                <div class="row" style="margin-top: 10px;padding: 20px;">
                                    <div class="col-sm-12 col-md-10 col-lg-10 "  style="margin: auto" >
                                        <div class="contact-form-wizard">

                                            <div class="card" >
                                                <div class="card-body">

                                                    <div class="row">
                                                       <div class="col-lg-12" style="margin: auto">
                                                           <label> Are you ...  ? </label>
                                                           <div class="form-check form-check-inline">
                                                               <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="a" checked>
                                                               <label class="form-check-label" for="exampleRadios1">
                                                                   Full Time Student
                                                               </label>
                                                           </div>
                                                           <div class="form-check form-check-inline">
                                                               <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="b">
                                                               <label class="form-check-label" for="exampleRadios2">
                                                                   MOE School Teacher
                                                               </label>
                                                           </div>
                                                           <div class="form-check form-check-inline">
                                                               <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="c">
                                                               <label class="form-check-label" for="exampleRadios3">
                                                                   Full Time / Part Time Tutor
                                                               </label>
                                                           </div>

                                                       </div>

                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="fullname">Full Name</label>
                                                                <input type="text" name="fullname" class="form-control" id="fullname"   placeholder="e.g Muhammad Atif Akram">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="gender"> Choose Gender</label>
                                                                <select class="form-control" id="gender" name="gender">

                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="mobile">Mobile # <code><small> ( to get SMS when matched to assignments )</small></code></label>
                                                                <input type="tel" name="mobile" class="form-control"  id="mobile"  placeholder="+65 xxx xxx xxxx">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="birth_year"> Birth Year <code><small> YYY format (e.g. 1980).</small></code></label>
                                                                <select class="form-control" name="birth_year" id="birth_year">

                                                                    @php
                                                                        $year = 2020;
                                                                        for(;$year > 1960; $year--){
                                                                    @endphp
                                                                    <option value="{{$year}}">{{$year}}</option>
                                                                    @php
                                                                        }
                                                                    @endphp
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="postal_code"> Postal Code <code><small> (Must be valid to get notification )</small></code></label>
                                                                <input type="tel" id="postal_code" name="postal_code" class="form-control"   placeholder="Postal Code ">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="race">Choose Race</label>
                                                                <select class="form-control" id="race" name="race">
                                                                    @foreach($races as $race)
                                                                        <option value="{{$race->title}}">{{$race->title}}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="birth_year">Birth Country </label>
                                                                <select class="form-control" id="birth_year" name="country">
                                                                    <option disabled selected>  Birth Country</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="citizenship">Choose Citizenship</label>
                                                                <select class="form-control" name="citizenship" id="citizenship">
                                                                    @foreach($citizenships as $citizenship)
                                                                        <option value="{{$citizenship->name}}">{{$citizenship->name}}</option>
                                                                    @endforeach
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div >

                                </div>
                            </div>
                        </section>
                        <h3>
                            <div class="media">
                                <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i></div>
                                <div class="media-body">
                                    <div class="bd-wizard-step-title">Review </div>
                                    <div class="bd-wizard-step-subtitle">Step 3</div>
                                </div>
                            </div>
                        </h3>
                        <section>
                            <div class="content-wrapper">
                                <h4 class="section-heading mb-5">Review your Details</h4>
                                <h6 class="font-weight-bold">Personal Details</h6>
                                <p class="mb-4"><span id="enteredFirstName">Cha</span> <span id="enteredLastName">Ji-Hun C</span> <br>
                                    Phone: <span id="enteredPhoneNumber">+230-582-6609</span> <br>
                                    Email: <span id="enteredEmailAddress">willms_abby@gmail.com</span></p>
                                <h6 class="font-weight-bold">Employment Details</h6>
                                <p class="mb-0"><span id="enteredDesignation">Junior Developer</span> - <span id="enteredDepartment">UI Development</span> <br>
                                    Phone: <span id="enteredEmployeeNumber">JDUI36849</span> <br>
                                    Email: <span id="enteredWorkEmailAddress">willms_abby@company.com</span></p>
                            </div>
                        </section>
                        <h3>
                            <div class="media">
                                <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
                                <div class="media-body">
                                    <div class="bd-wizard-step-title">Submit</div>
                                    <div class="bd-wizard-step-subtitle">Step 4</div>
                                </div>
                            </div>
                        </h3>
                        <section>
                            <div class="content-wrapper">
                                <h4 class="section-heading mb-5">Accept agreement and Submit</h4>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        I hereby declare that I had read all the <a href="#!">terms and conditions</a>  and all the details provided my me in this form are true.
                                    </label>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="{{asset('auth-user/js/main.js')}}"></script>
    <script src="{{asset('wizard/assets/js/jquery.steps.min.js')}}"></script>
    <script src="{{asset('wizard/assets/js/bd-wizard.js')}}"></script>
    <script src="{{asset('assets/js/registeration_form.js')}}"></script>
@endsection