

@extends('layouts.dashboard')

@section('content')


        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 col-12 align-self-center">
                        <h3 class="text-themecolor">Profile</h3>
                        <!--<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User Dashboard</li>
                        </ol>-->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->

                <div class="row">

                    <div class="col-md-12 col-12">
                         <label>Referral link</label>
                         <div class="alert alert-success" role="alert">
                            {{Auth::user()->referal_link}}
                         </div>
                     
                    </div>
                    <br><br>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-1 col-xlg-3 col-md-5">
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{asset('dashboard/assets/images/avatar.jpg')}}" class="img-circle" width="150">
                                    <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                                </center>
                            </div>
                            <span>
                                <hr> </span>
                            <div class="card-body"> <small class="text-muted">User Profile </small>
                                
                                <h6><?php if(isset(Auth::user()->name)){echo Auth::user()->email;} ?></h6> 
                                <h6> <?php if(isset(Auth::user()->phone)){echo Auth::user()->phone;} ?></h6>
                                <small class="text-muted p-t-30 db">Bank Details</small>
                                <h6><?php if(isset(Auth::user()->bank)){echo Auth::user()->bank;} ?></h6>
                                <h6><?php if(isset(Auth::user()->account_no)){echo Auth::user()->account_no;} ?></h6> 
                                <h6><?php if(isset(Auth::user()->account_name)){echo Auth::user()->account_name;} ?></h6>
                               
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" action="{{route('user.profile.update')}}" method="POST">


                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input placeholder="" class="form-control form-control-line" type="text" name="name" id="name" value="{{Auth::user()->name}}">
                                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input placeholder="" class="form-control form-control-line" type="email" name="email" value="{{Auth::user()->email}}" id="email">
                                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                             <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input placeholder="08134546578" class="form-control form-control-line" type="number" name="phone" id="phone" value="{{Auth::user()->phone}}">
                                                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>


                                             <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
                                                <label for="example-email" class="col-md-12">Currency</label>
                                                <div class="col-md-12">

                                                    <select class="form-control form-control-line" name="currency" id="currency">
                                                         <option disabled="disabled" selected="selected">Select Currency</option>
                                                        <option value="lc">Local</option>
                                                         <option value="eth">Ethereum</option>
                                                          <option value="etn">Electroneum</option>
                                                    </select>

                                                     @if ($errors->has('currency'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                                @endif
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label for="example-email" class="col-md-12">Nationality</label>
                                                <div class="col-md-12">

                                                    <select class="form-control form-control-line" name="country" id="country">
                                                         <option disabled="disabled" selected="selected">Select Country</option>
                                                        
    <option value="AF">Afghanistan</option>
    <option value="AX">Åland Islands</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algeria</option>
    <option value="AS">American Samoa</option>
    <option value="AD">Andorra</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarctica</option>
    <option value="AG">Antigua and Barbuda</option>
    <option value="AR">Argentina</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbaijan</option>
    <option value="BS">Bahamas</option>
    <option value="BH">Bahrain</option>
    <option value="BD">Bangladesh</option>
    <option value="BB">Barbados</option>
    <option value="BY">Belarus</option>
    <option value="BE">Belgium</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermuda</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Bolivia, Plurinational State of</option>
    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
    <option value="BA">Bosnia and Herzegovina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Bouvet Island</option>
    <option value="BR">Brazil</option>
    <option value="IO">British Indian Ocean Territory</option>
    <option value="BN">Brunei Darussalam</option>
    <option value="BG">Bulgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Cambodia</option>
    <option value="CM">Cameroon</option>
    <option value="CA">Canada</option>
    <option value="CV">Cape Verde</option>
    <option value="KY">Cayman Islands</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="CL">Chile</option>
    <option value="CN">China</option>
    <option value="CX">Christmas Island</option>
    <option value="CC">Cocos (Keeling) Islands</option>
    <option value="CO">Colombia</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo, the Democratic Republic of the</option>
    <option value="CK">Cook Islands</option>
    <option value="CR">Costa Rica</option>
    <option value="CI">Côte d'Ivoire</option>
    <option value="HR">Croatia</option>
    <option value="CU">Cuba</option>
    <option value="CW">Curaçao</option>
    <option value="CY">Cyprus</option>
    <option value="CZ">Czech Republic</option>
    <option value="DK">Denmark</option>
    <option value="DJ">Djibouti</option>
    <option value="DM">Dominica</option>
    <option value="DO">Dominican Republic</option>
    <option value="EC">Ecuador</option>
    <option value="EG">Egypt</option>
    <option value="SV">El Salvador</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Ethiopia</option>
    <option value="FK">Falkland Islands (Malvinas)</option>
    <option value="FO">Faroe Islands</option>
    <option value="FJ">Fiji</option>
    <option value="FI">Finland</option>
    <option value="FR">France</option>
    <option value="GF">French Guiana</option>
    <option value="PF">French Polynesia</option>
    <option value="TF">French Southern Territories</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Georgia</option>
    <option value="DE">Germany</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Greece</option>
    <option value="GL">Greenland</option>
    <option value="GD">Grenada</option>
    <option value="GP">Guadeloupe</option>
    <option value="GU">Guam</option>
    <option value="GT">Guatemala</option>
    <option value="GG">Guernsey</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="GY">Guyana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Heard Island and McDonald Islands</option>
    <option value="VA">Holy See (Vatican City State)</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hong Kong</option>
    <option value="HU">Hungary</option>
    <option value="IS">Iceland</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
    <option value="IR">Iran, Islamic Republic of</option>
    <option value="IQ">Iraq</option>
    <option value="IE">Ireland</option>
    <option value="IM">Isle of Man</option>
    <option value="IL">Israel</option>
    <option value="IT">Italy</option>
    <option value="JM">Jamaica</option>
    <option value="JP">Japan</option>
    <option value="JE">Jersey</option>
    <option value="JO">Jordan</option>
    <option value="KZ">Kazakhstan</option>
    <option value="KE">Kenya</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Korea, Democratic People's Republic of</option>
    <option value="KR">Korea, Republic of</option>
    <option value="KW">Kuwait</option>
    <option value="KG">Kyrgyzstan</option>
    <option value="LA">Lao People's Democratic Republic</option>
    <option value="LV">Latvia</option>
    <option value="LB">Lebanon</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libya</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Lithuania</option>
    <option value="LU">Luxembourg</option>
    <option value="MO">Macao</option>
    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malaysia</option>
    <option value="MV">Maldives</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="MH">Marshall Islands</option>
    <option value="MQ">Martinique</option>
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Mayotte</option>
    <option value="MX">Mexico</option>
    <option value="FM">Micronesia, Federated States of</option>
    <option value="MD">Moldova, Republic of</option>
    <option value="MC">Monaco</option>
    <option value="MN">Mongolia</option>
    <option value="ME">Montenegro</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Netherlands</option>
    <option value="NC">New Caledonia</option>
    <option value="NZ">New Zealand</option>
    <option value="NI">Nicaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Norfolk Island</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="NO">Norway</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PS">Palestinian Territory, Occupied</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua New Guinea</option>
    <option value="PY">Paraguay</option>
    <option value="PE">Peru</option>
    <option value="PH">Philippines</option>
    <option value="PN">Pitcairn</option>
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="PR">Puerto Rico</option>
    <option value="QA">Qatar</option>
    <option value="RE">Réunion</option>
    <option value="RO">Romania</option>
    <option value="RU">Russian Federation</option>
    <option value="RW">Rwanda</option>
    <option value="BL">Saint Barthélemy</option>
    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
    <option value="KN">Saint Kitts and Nevis</option>
    <option value="LC">Saint Lucia</option>
    <option value="MF">Saint Martin (French part)</option>
    <option value="PM">Saint Pierre and Miquelon</option>
    <option value="VC">Saint Vincent and the Grenadines</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Sao Tome and Principe</option>
    <option value="SA">Saudi Arabia</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapore</option>
    <option value="SX">Sint Maarten (Dutch part)</option>
    <option value="SK">Slovakia</option>
    <option value="SI">Slovenia</option>
    <option value="SB">Solomon Islands</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    <option value="GS">South Georgia and the South Sandwich Islands</option>
    <option value="SS">South Sudan</option>
    <option value="ES">Spain</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    <option value="SR">Suriname</option>
    <option value="SJ">Svalbard and Jan Mayen</option>
    <option value="SZ">Swaziland</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
    <option value="SY">Syrian Arab Republic</option>
    <option value="TW">Taiwan, Province of China</option>
    <option value="TJ">Tajikistan</option>
    <option value="TZ">Tanzania, United Republic of</option>
    <option value="TH">Thailand</option>
    <option value="TL">Timor-Leste</option>
    <option value="TG">Togo</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trinidad and Tobago</option>
    <option value="TN">Tunisia</option>
    <option value="TR">Turkey</option>
    <option value="TM">Turkmenistan</option>
    <option value="TC">Turks and Caicos Islands</option>
    <option value="TV">Tuvalu</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraine</option>
    <option value="AE">United Arab Emirates</option>
    <option value="GB">United Kingdom</option>
    <option value="US">United States</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="UY">Uruguay</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VE">Venezuela, Bolivarian Republic of</option>
    <option value="VN">Viet Nam</option>
    <option value="VG">Virgin Islands, British</option>
    <option value="VI">Virgin Islands, U.S.</option>
    <option value="WF">Wallis and Futuna</option>
    <option value="EH">Western Sahara</option>
    <option value="YE">Yemen</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>

                                                    </select>

                                                     @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                                                    
                                                </div>
                                            </div>


                                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Account Name</label>
                                                <div class="col-md-12">
                                                    <input value="{{Auth::user()->account_name}}" class="form-control form-control-line" type="text" name="account_name" id="account_name">
                                                    @if ($errors->has('account_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                           
                                            <div class="form-group{{ $errors->has('account_no') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Account Number</label>
                                                <div class="col-md-12">
                                                    <input value="{{Auth::user()->account_no}}" class="form-control form-control-line" type="text" name="account_no" id="account_no">
                                                    @if ($errors->has('account_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_no') }}</strong>
                                    </span>
                                @endif
                                         
                                                </div>
                                            </div>

                                             <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                                                <label for="example-email" class="col-md-12">Bank Name</label>
                                                <div class="col-md-12">

                                                    <select class="form-control form-control-line" name="bank" id="bank">
                                                         <option disabled="disabled" selected="selected">Select Bank</option>
<option value="access">Access Bank</option>
<option value="citibank">Citibank</option>
<option value="diamond">Diamond Bank</option>
<option value="ecobank">Ecobank</option>
<option value="fidelity">Fidelity Bank</option>
<option value="fcmb">First City Monument Bank (FCMB)</option>
<option value="fsdh">FSDH Merchant Bank</option>
<option value="gtb">Guarantee Trust Bank (GTB)</option>
<option value="heritage">Heritage Bank</option>
<option value="Keystone">Keystone Bank</option>
<option value="rand">Rand Merchant Bank</option>
<option value="skye">Skye Bank</option>
<option value="stanbic">Stanbic IBTC Bank</option>
<option value="standard">Standard Chartered Bank</option>
<option value="sterling">Sterling Bank</option>
<option value="suntrust">Suntrust Bank</option>
<option value="union">Union Bank</option>
<option value="uba">United Bank for Africa (UBA)</option>
<option value="unity">Unity Bank</option>
<option value="wema">Wema Bank</option>
<option value="zenith">Zenith Bank</option>
                                                    </select>

                                                     @if ($errors->has('bank'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                                                    
                                                </div>
                                            </div>


                                              <div class="form-group{{ $errors->has('wallet_name') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Wallet name</label>
                                                <div class="col-md-12">
                                                    <input value="{{Auth::user()->wallet_name}}" class="form-control form-control-line" type="text" id="wallet_name" name="wallet_name">

                                                     @if ($errors->has('wallet_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wallet_name') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>


                                             <div class="form-group{{ $errors->has('wallet_address') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Wallet address</label>
                                                <div class="col-md-12">
                                                    <input value="{{Auth::user()->wallet_address}}" class="form-control form-control-line" type="text" name="wallet_address" id="wallet_address">
                                                     @if ($errors->has('wallet_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wallet_address') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xlg-3 col-md-5">
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
           
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

                        @endsection


