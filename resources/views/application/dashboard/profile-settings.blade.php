@extends('application.layouts.app')
@section('title','Profile')
@section('links')
    <link rel="stylesheet" href="{{asset('static/css/dashboard.css')}}">
@endsection
@section('content')
    <!-- MAIN START -->
    <main class="sl-main">
        <div class="sl-main-section">
            <div class="container">
                <div class="row">

                    @include('application.dashboard.layouts.sidebar')
                    <div class="col-lg-8 col-xl-9">
                        <div class="sl-tab sl-profileSetting">
                            <nav class="nav">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-companyDetail-tab" data-toggle="tab" href="dashboard-profile-settings.html#nav-companyDetail" role="tab" aria-controls="nav-companyDetail" aria-selected="true">Basic/Company Detail</a>
                                    <a class="nav-item nav-link" id="nav-aboutDescription-tab" data-toggle="tab" href="dashboard-profile-settings.html#nav-aboutDescription" role="tab" aria-controls="nav-aboutDescription" aria-selected="true">About Description</a>
                                    <a class="nav-item nav-link" id="nav-experience-tab" data-toggle="tab" href="dashboard-profile-settings.html#nav-experience" role="tab" aria-controls="nav-experience" aria-selected="true">Experience & Awards</a>
                                    <a class="nav-item nav-link" id="nav-gallery-tab" data-toggle="tab" href="dashboard-profile-settings.html#nav-gallery" role="tab" aria-controls="nav-gallery" aria-selected="true">Audio Video Gallery</a>
                                </div>
                            </nav>
                            <div id="nav-tabContent" class="tab-content">
                                <div class="tab-pane fade show active" id="nav-companyDetail" role="tabpanel" aria-labelledby="nav-companyDetail-tab">
                                    <div class="sl-dashboardbox__content">
                                        @if(\Illuminate\Support\Facades\Session::has('error'))
                                            <div class="alert alert-danger">
                                                {{\Illuminate\Support\Facades\Session::get('error')}}
                                            </div>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Session::has('success'))
                                            <div class="alert alert-success">
                                                {{\Illuminate\Support\Facades\Session::get('success')}}
                                            </div>
                                        @endif
                                        <form class="sl-form sl-manageServices" method="post" action="{{route('app.dashboard.profile')}}" enctype="multipart/form-data">
                                           @csrf
                                            <input type="hidden" value="{{$user->id}}" name="user_id"/>
                                            <fieldset>
                                                <div class="sl-form__wrap">
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" name="fname" value="{{$user->fname}}" type="text" placeholder="First Name*">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" name="lname" value="{{$user->lname}}" type="text" placeholder="Last Name*">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <label class="sl-profileSetting__toltip">
                                                            <input class="form-control sl-form-control" name="company" value="{{$user->profile->company}}" type="text" placeholder="Company/User Title">
                                                            <i class="ti-help-alt toltip-content" data-tipso="name"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <label class="sl-profileSetting__toltip">
                                                            <input class="form-control sl-form-control" type="text" name="state" value="{{$user->profile->province}}" placeholder="State">
                                                            <i class="ti-help-alt toltip-content" data-tipso="name"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" name="phone" value="{{$user->profile->phone}}" type="number" placeholder="Phone">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" type="email" name="email" value="{{$user->email}}" readonly placeholder="Email*">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" type="text" value="{{$user->profile->physical_address}}"  placeholder="Physical Address">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" name="city" value="{{$user->profile->city}}" type="text" placeholder="City ">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" type="text" name="address_line_1" value="{{$user->profile->address_line_1}}"  placeholder="Address line 1">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control"  name="address_line_2" value="{{$user->profile->address_line_2}}" type="text" placeholder="Address line 2 ">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <select id="country" name="country" class="form-control sl-form-control">
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Åland Islands">Åland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russian Federation">Russian Federation</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Timor-leste">Timor-leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Viet Nam">Viet Nam</option>
                                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>



                                                    </div>

                                                    <div class="form-group sl-profileSetting__socialmedia">
                                                        <label class="sl-input-group sl-facebook">
                                                            <a class="sl-prepend" href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>
                                                            <input class="form-control sl-form-control sl-append" type="text" placeholder="Add Facebook Link">
                                                        </label>
                                                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-small"><i class="ti-angle-down"></i></a>
                                                    </div>
                                                    <div class="form-group sl-profileSetting__socialmedia">
                                                        <label class="sl-input-group sl-googleplus">
                                                            <a class="sl-prepend" href="javascript:void(0);"><i class="fab fa-google"></i></a>
                                                            <input class="form-control sl-form-control sl-append" type="text" placeholder="Add Google Link">
                                                        </label>
                                                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-small sl-profileSetting__socialmedia--trash"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <div class="sl-manageServices__upload">
                                                            <div class="sl-manageServices__uploadarea">
                                                                <span><i class="fas fa-cloud-upload-alt"></i></span>
                                                                <h5>Profile Image</h5>
                                                                <p>Drop image here or click <label for="file1"><span><input id="file1" type="file" name="file"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>
                                                                <svg>
                                                                    <rect width="100%" height="204px"></rect>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                    <div class="form-group form-group-half">--}}
{{--                                                        <div class="sl-manageServices__upload">--}}
{{--                                                            <div class="sl-manageServices__uploadarea">--}}
{{--                                                                <span><i class="fas fa-cloud-upload-alt"></i></span>--}}
{{--                                                                <h5>Slider Image</h5>--}}
{{--                                                                <p>Drop image here or click <label for="file2"><span><input id="file2" type="file" name="file"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>--}}
{{--                                                                <svg>--}}
{{--                                                                    <rect width="100%" height="204px"></rect>--}}
{{--                                                                </svg>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" type="text" placeholder="Longitude">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input class="form-control sl-form-control" type="text" placeholder="Latitude">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="sl-profileSetting__map">
                                                            <div id="sl-locationmap" class="sl-locationmap"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group sl-btnarea">
                                                        <button type="submit" class="btn sl-btn">Save Changes</button>
                                                        <span>Click “Save Changes” to update latest changes made</span>
                                                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">Preview Page</a>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-aboutDescription" role="tabpanel" aria-labelledby="nav-aboutDescription-tab">
                                    <div class="sl-dashboardbox__content sl-aboutDescription">
                                        <form class="sl-form sl-manageServices">
                                            <fieldset>
                                                <div class="sl-form__wrap">
                                                    <div class="sl-aboutDescription__content">
                                                        <div class="form-group">
                                                            <div class="sl-aboutDescription__title">
                                                                <h6>About You Or Your Company</h6>
                                                            </div>
                                                            <textarea id="sl-tinymceeditor1" class="sl-tinymceeditor" placeholder="Description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="sl-aboutDescription__content">
                                                        <div class="form-group">
                                                            <div class="sl-aboutDescription__title">
                                                                <h6>Add Your Languages</h6>
                                                            </div>
                                                            <label class="sl-aboutDescription__inputBtn">
                                                                <select id="sl-languages" class="form-control sl-form-control" multiple="multiple">
                                                                    <option>Chinese</option>
                                                                    <option>English</option>
                                                                    <option>Urdu</option>
                                                                    <option>Japanese</option>
                                                                </select>
                                                                <a href="javascript:void(0);" class="btn sl-btn">Add Now</a>
                                                            </label>
                                                            <table class="table sl-languageWeKnow__content sl-aboutDescription__table">
                                                                <tbody>
                                                                <tr>
                                                                    <td>English</td>
                                                                    <td>French</td>
                                                                    <td>Chinese</td>
                                                                    <td>Arabic</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Spanish</td>
                                                                    <td>Russian</td>
                                                                    <td>Portuguese</td>
                                                                    <td>Urdu</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="sl-aboutDescription__content">
                                                        <div class="form-group">
                                                            <div class="sl-aboutDescription__title">
                                                                <h6>Ameneties & Features</h6>
                                                            </div>
                                                            <label class="sl-aboutDescription__inputBtn">
                                                                <select id="sl-ameneties" class="form-control sl-form-control" multiple="multiple">
                                                                    <option>Chinese</option>
                                                                    <option>English</option>
                                                                    <option>Urdu</option>
                                                                    <option>Japanese</option>
                                                                </select>
                                                                <a href="javascript:void(0);" class="btn sl-btn">Add Now</a>
                                                            </label>
                                                            <table class="table sl-languageWeKnow__content sl-aboutDescription__table">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Accept Credit Cards</td>
                                                                    <td>Beauty Shop</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bike Parking</td>
                                                                    <td>Comfortable Chairs</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="sl-aboutDescription__content">
                                                        <div class="form-group sl-btnarea">
                                                            <button type="submit" class="btn sl-btn">Save Changes</button>
                                                            <span>Click “Save Changes” to update latest changes made</span>
                                                            <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">Preview Page</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-experience" role="tabpanel" aria-labelledby="nav-experience-tab">
                                    <div class="sl-dashboardbox__content sl-aboutDescription sl-experienceTab">
                                        <form class="sl-form sl-manageServices">
                                            <fieldset>
                                                <div class="sl-form__wrap">
                                                    <div class="sl-aboutDescription__content">
                                                        <div class="form-group">
                                                            <div class="sl-aboutDescription__title">
                                                                <h6>About You Or Your Company</h6>
                                                            </div>
                                                            <div class="sl-manageServices__upload">
                                                                <div class="sl-manageServices__uploadarea">
                                                                    <span><i class="fas fa-cloud-upload-alt"></i></span>
                                                                    <h5>Company Logo</h5>
                                                                    <p>Drop image here or click <label for="file3"><span><input id="file3" type="file" name="file"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>
                                                                    <svg>
                                                                        <rect width="100%" height="204px"></rect>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-half sl-input-btn">
                                                            <label class="sl-input-group">
                                                                <input class="form-control sl-form-control sl-prepend" type="text" placeholder="Company Title*">
                                                                <a class="sl-append" href="javascript:void(0);"><i class="ti-link"></i></a>
                                                            </label>
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <input class="form-control sl-form-control" type="text" placeholder="Job Designation">
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <label data-provide="datepicker">
                                                                <input type="text" id="sl-startdate" class="form-control sl-form-control" placeholder="Start Date">
                                                                <a href="javascript:void(0);" class="sl-calendarbtn sl-right-icon"><i class="ti-calendar"></i></a>
                                                            </label>
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <label data-provide="datepicker">
                                                                <input type="text" id="sl-enddate" class="form-control sl-form-control" placeholder="End Date (Leave empty if you’re working)">
                                                                <a href="javascript:void(0);" class="sl-calendarbtn sl-right-icon"><i class="ti-calendar"></i></a>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea id="sl-tinymceedito2" class="sl-tinymceeditor" placeholder="Description"></textarea>
                                                        </div>
                                                        <div class="form-group sl-btnarea">
                                                            <button type="submit" class="btn sl-btn">Add & Save Changes</button>
                                                            <span>Click “Add & Save Changes” to update latest changes made</span>
                                                        </div>
                                                        <div class="form-group sl-experienceTab__accordian">
                                                            <div id="accordion1" class="accordion">
                                                                <div  class="sl-servicedays sl-offeredServices">
                                                                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#accordion1collapse1" aria-expanded="true">
                                                                        <div class="sl-offeredServices__heading">
                                                                            <h6>Business Planner Manager</h6>
                                                                        </div>
                                                                        <div class="sl-servicedays__title--rightarea">
                                                                            <div class="sl-btnaction">
                                                                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                                                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="accordion1collapse1" class="collapse show" data-parent="#accordion1">
                                                                        <div class="sl-posts">
                                                                            <div class="sl-post">
                                                                                <div class="sl-post__content">
                                                                                    <img src="images/service-provider-single/experience/img-01.jpg" alt="Image Description">
                                                                                    <div class="sl-post__title">
                                                                                        <a href="javascript:void(0);">Bright Future Group &amp; Company</a>
                                                                                        <h5>Business Planner Manager</h5>
                                                                                        <span>May 2011 - Jun 2012</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="sl-post__description">
                                                                                    <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div  class="sl-servicedays sl-offeredServices">
                                                                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#accordion1collapse2" aria-expanded="false">
                                                                        <div class="sl-offeredServices__heading">
                                                                            <h6>Sr. Business Planner</h6>
                                                                        </div>
                                                                        <div class="sl-servicedays__title--rightarea">
                                                                            <div class="sl-btnaction">
                                                                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                                                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="accordion1collapse2" class="collapse" data-parent="#accordion1">
                                                                        <div class="sl-posts">
                                                                            <div class="sl-post">
                                                                                <div class="sl-post__content">
                                                                                    <img src="images/service-provider-single/experience/img-02.jpg" alt="Image Description">
                                                                                    <div class="sl-post__title">
                                                                                        <a href="javascript:void(0);">Delta Communication &amp; Development</a>
                                                                                        <h5>Sr. Business Planner</h5>
                                                                                        <span>Jul 2012 - Aug 2013</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="sl-post__description">
                                                                                    <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div  class="sl-servicedays sl-offeredServices">
                                                                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#accordion1collapse3" aria-expanded="false">
                                                                        <div class="sl-offeredServices__heading">
                                                                            <h6>business Coordinator</h6>
                                                                        </div>
                                                                        <div class="sl-servicedays__title--rightarea">
                                                                            <div class="sl-btnaction">
                                                                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                                                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="accordion1collapse3" class="collapse" data-parent="#accordion1">
                                                                        <div class="sl-posts">
                                                                            <div class="sl-post">
                                                                                <div class="sl-post__content">
                                                                                    <img src="images/service-provider-single/experience/img-03.jpg" alt="Image Description">
                                                                                    <div class="sl-post__title">
                                                                                        <a href="javascript:void(0);">Human Power &amp; Company</a>
                                                                                        <h5>Business Coordinator</h5>
                                                                                        <span>Nov 2014 - Aug 2015</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="sl-post__description">
                                                                                    <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sl-aboutDescription__content">
                                                        <div class="form-group">
                                                            <div class="sl-aboutDescription__title">
                                                                <h6>About Your Certificates & Awards</h6>
                                                            </div>
                                                            <div class="sl-manageServices__upload">
                                                                <div class="sl-manageServices__uploadarea">
                                                                    <span><i class="fas fa-cloud-upload-alt"></i></span>
                                                                    <h5>Add Photo</h5>
                                                                    <p>Drop image here or click <label for="file4"><span><input id="file4" type="file" name="file"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>
                                                                    <svg>
                                                                        <rect width="100%" height="204px"></rect>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <input class="form-control sl-form-control" type="text" placeholder="Add Title Here">
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <label data-provide="datepicker">
                                                                <input type="text" id="sl-date" class="form-control sl-form-control" placeholder="Award Date">
                                                                <a href="javascript:void(0);" class="sl-calendarbtn sl-right-icon"><i class="ti-calendar"></i></a>
                                                            </label>
                                                        </div>
                                                        <div class="form-group sl-btnarea">
                                                            <button type="submit" class="btn sl-btn">Add & Save Changes</button>
                                                            <span>Click “Add & Save Changes” to update latest changes made</span>
                                                        </div>
                                                        <div class="form-group sl-experienceTab__accordian">
                                                            <div id="accordion2" class="accordion">
                                                                <div  class="sl-servicedays sl-offeredServices">
                                                                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#accordion2collapse1" aria-expanded="true">
                                                                        <div class="sl-offeredServices__heading">
                                                                            <h6>Best Service Provider</h6>
                                                                            <span>December 31, 1969</span>
                                                                        </div>
                                                                        <div class="sl-servicedays__title--rightarea">
                                                                            <div class="sl-btnaction">
                                                                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                                                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="accordion2collapse1" class="collapse show" data-parent="#accordion2">
                                                                        <div class="sl-posts">
                                                                            <div class="sl-post">
                                                                                <div class="sl-post__content">
                                                                                    <img src="images/service-provider-single/experience/img-01.jpg" alt="Image Description">
                                                                                    <div class="sl-post__title">
                                                                                        <a href="javascript:void(0);">Bright Future Group &amp; Company</a>
                                                                                        <h5>Business Planner Manager</h5>
                                                                                        <span>May 2011 - Jun 2012</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="sl-post__description">
                                                                                    <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div  class="sl-servicedays sl-offeredServices">
                                                                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#accordion2collapse2" aria-expanded="false">
                                                                        <div class="sl-offeredServices__heading">
                                                                            <h6>Character Animation</h6>
                                                                            <span>April 14, 2001</span>
                                                                        </div>
                                                                        <div class="sl-servicedays__title--rightarea">
                                                                            <div class="sl-btnaction">
                                                                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                                                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="accordion2collapse2" class="collapse" data-parent="#accordion2">
                                                                        <div class="sl-posts">
                                                                            <div class="sl-post">
                                                                                <div class="sl-post__content">
                                                                                    <img src="images/service-provider-single/experience/img-02.jpg" alt="Image Description">
                                                                                    <div class="sl-post__title">
                                                                                        <a href="javascript:void(0);">Delta Communication &amp; Development</a>
                                                                                        <h5>Sr. Business Planner</h5>
                                                                                        <span>Jul 2012 - Aug 2013</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="sl-post__description">
                                                                                    <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div  class="sl-servicedays sl-offeredServices">
                                                                    <div class="sl-servicedays__title" data-toggle="collapse" role="list" data-target="#accordion2collapse3" aria-expanded="false">
                                                                        <div class="sl-offeredServices__heading">
                                                                            <h6>Company Video Intro </h6>
                                                                            <span>Jun 27, 2019</span>
                                                                        </div>
                                                                        <div class="sl-servicedays__title--rightarea">
                                                                            <div class="sl-btnaction">
                                                                                <a href="javascript:void(0);" class="sl-icon sl-editbtn"><i class="fas fa-pencil-alt"></i></a>
                                                                                <a href="javascript:void(0);" class="sl-icon sl-delbtn"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="accordion2collapse3" class="collapse" data-parent="#accordion2">
                                                                        <div class="sl-posts">
                                                                            <div class="sl-post">
                                                                                <div class="sl-post__content">
                                                                                    <img src="images/service-provider-single/experience/img-03.jpg" alt="Image Description">
                                                                                    <div class="sl-post__title">
                                                                                        <a href="javascript:void(0);">Human Power &amp; Company</a>
                                                                                        <h5>Business Coordinator</h5>
                                                                                        <span>Nov 2014 - Aug 2015</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="sl-post__description">
                                                                                    <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group sl-btnarea">
                                                            <button type="submit" class="btn sl-btn">Save Changes</button>
                                                            <span>Click “Save Changes” to update latest changes made</span>
                                                            <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">Preview Page</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                                    <div class="sl-dashboardbox__content sl-aboutDescription sl-galleryTab">
                                        <form class="sl-form sl-manageServices">
                                            <fieldset>
                                                <div class="sl-form__wrap">
                                                    <div class="form-group">
                                                        <div class="sl-manageServices__upload">
                                                            <div class="sl-manageServices__uploadarea">
                                                                <span><i class="fas fa-cloud-upload-alt"></i></span>
                                                                <h5>Upload Media Gallery</h5>
                                                                <p>Drop image here or click <label for="file5"><span><input id="file5" type="file" name="file"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>
                                                                <svg>
                                                                    <rect width="100%" height="204px"></rect>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="sl-galleryTab__gallery">
                                                            <div class="sl-row">
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-01.jpg" alt="Image Description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-02.jpg" alt="Image Description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-03.jpg" alt="Image Description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-07.jpg" alt="img description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-05.jpg" alt="Image Description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-06.jpg" alt="Image Description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-07.jpg" alt="Image Description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                                <div class="sl-col-1-of-2 sl-col-md-1-of-3 sl-col-xl-1-of-4">
                                                                    <figure class="sl-galleryTab__gallery--item">
                                                                        <img src="images/profile-settings/gallery/img-08.jpg" alt="Image Description">
                                                                        <a class="sl-deleteImg" href="javascript:void(0);"><i class="fas fa-times"></i>Delete</a>
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group sl-btnarea">
                                                        <button type="submit" class="btn sl-btn">Save Changes</button>
                                                        <span>Click “Save Changes” to update latest changes made</span>
                                                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">Preview Page</a>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN END -->
@endsection
@section('scripts')
    <script src="{{asset('static/js/vendor/tinymce/tinymce.min.js%3FapiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci')}}"></script>
@endsection
