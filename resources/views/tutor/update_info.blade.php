@extends('layouts.app')
@section('title','Site | Home')
@section('links')
<link rel="stylesheet" href="{{asset('auth-user/css/style.css')}}">

<link rel="stylesheet" href="{{asset('auth-user/fonts/icomoon/style.css')}}">

<link rel="stylesheet" href="{{asset('wizard/assets/css/bd-wizard.css')}}">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

<link rel="stylesheet" href="{{asset('assets/css/switch.css')}}"/>


<link rel="stylesheet" href="{{asset('dist/css/bootstrap-select.css')}}">

<meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')

@include('tutor.layouts.sidebar')
<main>
  <div class="site-section">
    <div class="container">
      <br/>

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

                                <form id="basic_info_form" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-12 col-lg-6">

                                                <div class="form-group">
                                                    <label for="fullname">Full Name</label>
                                                    <input type="text" name="fullname" value="<?=$user->name?>" class="form-control" id="fullname"   placeholder="e.g Muhammad Atif Akram">
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="gender"> Choose Gender</label>
                                                    <select class="custom-select custom-select-md" id="gender" name="gender">
                                                        <option value="" selected disabled style="">Choose Gender</option>
                                                        <option <?=isset($basicInfo) && $basicInfo->gender == "Male" ? 'selected':'' ?> value="Male">Male</option>
                                                        <option  <?=isset($basicInfo) && $basicInfo->gender == "Female" ? 'selected':'' ?> value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile # <code><small> ( to get SMS when matched to assignments )</small></code></label>
                                                    <input type="tel" value="<?=@$basicInfo->mobile?>" name="mobile" class="form-control"  id="mobile"  placeholder="+65 xxx xxx xxxx">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="birth_year"> Birth Year <code><small> YYY format (e.g. 1980).</small></code></label>
                                                    <select class="custom-select custom-select-md" name="birth_year" id="birth_year">
                                                        <option selected disabled>Select Year</option>
                                                        @php
                                                            $year = 2020;
                                                            for(;$year > 1960; $year--){
                                                        @endphp
                                                        <option <?=isset($basicInfo) && $basicInfo->year == $year ? 'selected':'' ?> value="{{$year}}">{{$year}}</option>
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
                                                    <input type="tel" value="<?=@$basicInfo->postal_code?>" id="postal_code" name="postal_code" class="form-control"   placeholder="Postal Code ">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="race">Choose Race</label>
                                                    <select class="custom-select custom-select-md" id="race" name="race">
                                                        <option selected disabled>Choose Race</option>
                                                        @foreach($races as $race)
                                                            <option <?=isset($basicInfo) && $basicInfo->race == $race->id ? 'selected':'' ?> value="{{$race->id}}">{{$race->title}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="birth_year">Birth Country </label>
                                                    <select class="custom-select custom-select-md" id="birth_year" name="country">
                                                        @isset($basicInfo)
                                                            <option value="{{$basicInfo->country}}" selected>{{$basicInfo->country}}</option>
                                                        @else
                                                            <option disabled selected>  Birth Country</option>
                                                        @endisset

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
                                                    <select class="custom-select custom-select-md" name="citizenship" id="citizenship">
                                                        <option selected disabled>Citizenship</option>
                                                        @foreach($citizenships as $citizenship)
                                                            <option <?= isset($basicInfo) && $basicInfo->citizenship == $citizenship->id ? 'selected':''?> value="{{$citizenship->id}}">{{$citizenship->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                </form>

                            </div>
                        </div >

                    </div>







                </div>

            </section>
          <h3>
            <div class="media">
              <div class="bd-wizard-step-icon"><i class="mdi mdi-school"></i></div>
              <div class="media-body">
                <div class="bd-wizard-step-title">Education</div>
                <div class="bd-wizard-step-subtitle">Step 2</div>
              </div>
            </div>
          </h3>
          <section>
            <div class="content-wrapper">
              <div class="row" style="margin-top: 10px;padding: 20px;">
                <div class="col-sm-12 col-md-10 col-lg-10 "  style="margin: auto" >
                  <div class="contact-form-wizard">

                   <form id="education_form" onsubmit="return false">
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                       <div class="card" >
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-md-12 col-sm-12 col-lg-12" style="text-align: center">
                                       <h5 style="color: cadetblue;font-family: fantasy;padding: 5px 5px 1px 1px;text-align: center"> What status belongs you ? </h5>
                                   </div>
                                   <div class="col-lg-12" style="margin: auto;text-align: center">

                                       <div class="form-check form-check-inline">
                                           <input class="form-check-input" checked type="radio" name="tutorrole" id="fulltimestudent" <?php echo isset($education) && ($education->category == "Full Time Student") ? 'checked':'' ?> value="Full Time Student">
                                           <label class="form-check-label" for="fulltimestudent">
                                               Full Time Student
                                           </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                           <input class="form-check-input" type="radio" name="tutorrole" id="moeschoolteacher" <?php echo isset($education) && ($education->category == "MOE School Teacher") ? 'checked':'' ?> value="MOE School Teacher">
                                           <label class="form-check-label" for="moeschoolteacher">
                                               MOE School Teacher
                                           </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                           <input class="form-check-input" type="radio" name="tutorrole" id="fulltimetutor" <?php echo isset($education) && ($education->category == "Full Time") ? 'checked':'' ?>  value="Full Time">
                                           <label class="form-check-label" for="fulltimetutor">
                                               Full Time Tutor
                                           </label>
                                       </div>

                                       <div class="form-check form-check-inline">
                                           <input class="form-check-input" type="radio" name="tutorrole" id="parttimetutor" <?php echo isset($education) && ($education->category == "Part Time") ? 'checked':'' ?> value="Part Time">
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
                                               <select name="sub_category_students" id="student_status" class="custom-select custom-select-sm">
                                                  @foreach($student_categories as $student)
                                                      <option <?= isset($education) && ($education->category == "Full Time Student") &&   $education->sub_category == $student->student_categories_id ? 'selected':'' ?> value="{{$student->student_categories_id}}">{{$student->category}}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div>


                                   </div>

                                   <div class="row" id="moeschoolteacher" style="display: none;margin-top:15px">
                                       <br/>
                                       <div class="col-sm-12 col-lg-6 col-md-6">
                                           <div class="form-group">
                                               <label>MOE/School Email Address *</label>
                                               <input type="text" value="<?=isset($education) ? $education->moe_email:''?>" name="moe_email" class="form-control" style="height: 30px"/>
                                           </div>

                                       </div>

                                       <div class="col-md-6 col-lg-6">
                                           <div class="form-group">
                                               <label>Please Specifiy</label>
                                               <select class="custom-select custom-select-sm" name="sub_category_students_moe">

                                                   @foreach($moespecs as $spec)
                                                       <option <?= isset($education) && ($education->category == "MOE School Teacher") &&   $education->sub_category == $student->student_categories_id ? 'selected':'' ?>  value="{{$spec->id}}">{{$spec->specification}}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row" id="fulltimetutor" style="display: none"></div>

                                   <div class="row" id="parttimetutor" style="display: none"></div>

                               </div>


                               <div class="col-sm-12 col-lg-12 col-md-12 col-12">
                                   <div class="row">
                                       <div class="col-lg-4 col-md-4 ml-15">
                                           <div class="form-group codestacx">
                                               <label> Are you NIE-trained ? </label>
                                               <br/>
                                               <script>
                                                   function changeNIE(value = null){
                                                       if(value !=null){
                                                           document.getElementById('switcher').click()
                                                       }else{
                                                           const element = document.getElementById('is_nie_trained');

                                                           if(element.value === '0'){
                                                               element.value = '1'
                                                           }else{
                                                               element.value = '0'
                                                           }
                                                       }

                                                   }
                                               </script>

                                               <label class="codestacx-switch switch-left-right">

                                                   <input onchange=""   id="is_nie_trained" class="switch-input" name="is_nie_trained" value="0" type="checkbox">
                                                    <?php if(isset($education)): ?>
{{--                                                            <script>--}}
{{--                                                               // changeNIE(<?=$education->is_nie_trained?>);--}}
{{--                                                            </script>--}}
                                                   <?php endif;?>
                                                   <span class="switch-label" id="switcher" onclick="changeNIE()"  data-on="No" data-off="Yes"></span> <span class="switch-handle"></span> </label>
                                           </div>
                                       </div>
                                       <div class="col-sm col-md-7 col-lg-7">
                                           <div class="form-group">
                                               <label for="highest_qualification" class="mt-4">What's your highest qualification attained</label>
                                               <select name="highest_qualification" id="highest_qualification" class="custom-select custom-select-sm">
                                                   @foreach($qualifications as $qualification)
                                                       <option <?= isset($education) && ($education->highest_qualification == $qualification->qu_id) ? 'selected':'' ?>  value="{{$qualification->qu_id}}">{{$qualification->qualification}}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="accordion" id="accordian">
                                       <?php
                                        $index = 0;
                                       ?>
                                       @isset($education)
                                           @foreach($educationInfoCourses as $iteration => $info)
                                               @php
                                                echo \App\Helpers\Helper::preparedCard($info,($iteration));
                                               @endphp
                                           @endforeach
                                           @php
                                                $index = count($educationInfoCourses);
                                           @endphp
                                       @else
                                           @php
                                               echo \App\Helpers\Helper::loadCard();
                                           @endphp
                                       @endisset


                                        </div>

                               </div>

                               <div onclick="commonServer.addCollapseSection('accordian','<?=$index?>')" class="col-sm-8 col-lg-6 col-md-6" style="margin: 20px;cursor: pointer">
                                   <span style="font-size: 15px;"> <i style="color: red;font-size: 15px;" class="fa fa-plus 2x"></i> Add a new School/Course record</span>
                               </div>



                           </div>
                       </div>
                   </form>
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
                    <div class="row" style="margin-top: 10px;padding: 20px;">
                        <div class="col-sm-12 col-md-12 col-lg-12 "  style="margin: auto" >

                            <div class="contact-form-wizard">

                                <div class="accordion" id="educationExperienceCards">

                                    <form id="experience_form">
                                        <div class="card">
                                            <div class="card-header" id="MoeExperienceCard" style="background-color: cadetblue">
                                  <span class="mb-0">
                                      <span style="cursor: pointer;color:#ffffff" class="collapsed"   data-toggle="collapse" data-target="#moeExperienceCollapse" aria-expanded="false" aria-controls="moeExperienceCollapse">

                                          <strong>Academic</strong> <span >(E.g. Primary, Secondary, JC, University)</span>
                                      </span>
                                  </span>
                                            </div>
                                            <div id="moeExperienceCollapse" class="collapse" aria-labelledby="MoeExperienceCard" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <?php \App\Helpers\Helper::loadExperienceCard(); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="MusicExperienceCard" style="background-color: chocolate">
                                            <span class="mb-0">
                                                <span style="cursor: pointer;color:#ffffff"  data-toggle="collapse" data-target="#MusicExperienceCardCollapse" aria-expanded="false" aria-controls="MusicExperienceCardCollapse">
                                                    <strong>Music</strong> <span>(E.g. Piano, Flute, Clarinet)</span>
                                                </span>
                                            </span>
                                            </div>
                                            <div id="MusicExperienceCardCollapse" class="collapse" aria-labelledby="MusicExperienceCard" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <?php \App\Helpers\Helper::loadMusicExperienceCard(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </div>






                            </div>
                        </div >

                    </div>







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
                      <div class="row" style="margin-top: 10px;padding: 20px;">
                          <div class="col-sm-12 col-md-12 col-lg-12 "  style="margin: auto" >
                              <div class="contact-form-wizard">

                                 <form id="prefernce_form">
                                     <div class="card" >
                                         <div class="card-body">
                                       <span id="render_content_here">
                                            <?php \App\Helpers\Helper::loadPreferencePage(); ?>
                                       </span>

                                         </div>
                                     </div>
                                 </form>
                              </div>
                          </div >
                      </div>
                  </div>
                </section>

            <h3>
                <div class="media">
                    <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
                    <div class="media-body">
                        <div class="bd-wizard-step-title">Submit</div>

                    </div>
                </div>
            </h3>
            <section>
                <div class="content-wrapper">
                    <div class="row" style="margin-top: 10px;padding: 20px;">
                        <div class="col-sm-12 col-md-12 col-lg-12 "  style="margin: auto" >
                            <div class="contact-form-wizard">

                                <div class="card" >
                                    <div class="card-body">
                                       <form method="POST" id="document_form" enctype="multipart/form-data">
                                           <?php \App\Helpers\Helper::loadDocumentPage();?>
                                       </form>

                                    </div>
                                </div>
                            </div>
                        </div >
                    </div>
                </div>
            </section>
              </div>

          </div>
        </div>
      </main>
      @endsection
      @section('scripts')


          <script src="{{asset('auth-user/js/main.js')}}"></script>
      <script src="{{asset('wizard/assets/js/jquery.steps.min.js')}}"></script>
      <script src="{{asset('wizard/assets/js/bd-wizard.js')}}"></script>
      <script src="{{asset('assets/js/registeration_form.js')}}"></script>
          <!-- Latest compiled and minified JavaScript -->
          <script src="{{asset('dist/js/bootstrap-select.js')}}"></script>

          <script type="text/javascript">

      </script>
      @endsection
