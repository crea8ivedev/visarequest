@extends('frontend.layouts.app')
@section('content')
<rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery">

    <rs-module id="rev_slider_1_1" data-version="6.1.0">

        <rs-slides>

            <rs-slide data-key="rs-1" data-title="Slide" data-thumb="images/slides/slider-mainbg-005.jpg" data-anim="ei:d;eo:d;s:d;r:0;t:slotzoom-horizontal;sl:d;">

                <img src="images/slides/slider-mainbg-005.jpg" title="slide-bgimg" width="1920" height="450" class="rev-slidebg" data-no-retina>
                <rs-layer id="slider-1-slide-1-layer-7" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:l,l,l,c;xo:50px,50px,20px,0;y:t,t,m,t;yo:170px,170px,-57px,86px;" data-text="w:normal;s:48,48,38,32;l:50,50,40,38;a:left;fw:300;" data-frame_0="y:100%;tp:600;" data-frame_1="tp:600;e:Power0.easeIn;st:400;sp:800;sR:400;" data-frame_999="o:0;tp:600;st:w;sR:7800;" style="z-index:9;font-family: 'Roboto', sans-serif; text-transform:capitalize;"> Welcome to VisaRequest agency
                </rs-layer>

                <rs-layer id="slider-1-slide-1-layer-8" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:l,l,l,c;xo:50px,50px,20px,0;y:t,t,m,t;yo:250px,250px,4px,134px;" data-text="w:normal;s:48,48,38,32;l:50,50,40,38;a:left;fw:300;" data-frame_0="y:100%;tp:600;" data-frame_1="tp:600;e:Power0.easeIn;st:660;sp:800;sR:660;" data-frame_999="o:0;tp:600;st:w;sR:7540;" style="z-index:48;font-family: 'Roboto', sans-serif; text-transform:capitalize;">
                    <strong>Since 1980</strong> we are experts in the <strong>global industry</strong>
                </rs-layer>
            </rs-slide>

            <rs-slide data-key="rs-2" data-title="Slide" data-thumb="images/slides/slider-mainbg-006.jpg" data-anim="ei:d;eo:d;s:d;r:0;t:slotzoom-horizontal;sl:d;">

                <img src="images/slides/slider-mainbg-006.jpg" title="slide-bgimg" width="1920" height="450" class="rev-slidebg" data-no-retina>

                <rs-layer id="slider-1-slide-2-layer-7" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:l,l,l,c;xo:50px,50px,20px,0;y:t,t,m,t;yo:170px,170px,-57px,86px;" data-text="w:normal;s:48,48,38,32;l:50,50,40,38;a:left;fw:300;" data-frame_0="y:100%;tp:600;" data-frame_1="tp:600;e:Power0.easeIn;st:400;sp:800;sR:400;" data-frame_999="o:0;tp:600;st:w;sR:7800;" style="z-index:9;font-family: 'Roboto', sans-serif; text-transform:capitalize;"> We bring the breadth of our experience and
                </rs-layer>

                <rs-layer id="slider-1-slide-2-layer-8" data-type="text" data-color="#fff" data-rsp_ch="on" data-xy="x:l,l,l,c;xo:50px,50px,20px,0;y:t,t,m,t;yo:250px,250px,4px,134px;" data-text="w:normal;s:48,48,38,32;l:50,50,40,38;a:left;fw:300;" data-frame_0="y:100%;tp:600;" data-frame_1="tp:600;e:Power0.easeIn;st:660;sp:800;sR:660;" data-frame_999="o:0;tp:600;st:w;sR:7540;" style="z-index:48;font-family: 'Roboto', sans-serif; text-transform:capitalize;"> industry knowledge to help you Succeed.
                </rs-layer>

            </rs-slide>

        </rs-slides>
        <rs-progress class="rs-bottom" style="visibility: hidden !important;"></rs-progress>
    </rs-module>
</rs-module-wrap>
<!-- END REVOLUTION SLIDER -->

<!--site-main start-->
<div class="site-main">

    <!--features-section-->
    <section class="cmt-row features-section cmt-bgcolor-grey bg-img1 cmt-bg cmt-bgimage-yes cmt-bg-pattern clearfix">
        <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- section title -->
                    <div class="section-title style2">
                        <div class="title-header">
                            <h5>Select a Country to see services</h5>
                            <h2 class="title">Professional<strong> Visa Assistance</strong></h2>
                        </div>
                        <div class="title-desc">
                            <p>We are an expert visa consultant focusing on providing quick services to all your travelling needs. Be it a visa, travel insurance, flight ticketing, we cover it all.</p>
                            <p>
                                We are an expert visa consultant focusing on providing quick services to all your travelling needs. Be it a visa, travel insurance, flight ticketing, we cover it all.
                            </p>
                            <label for="countries" class="lead" style="text-indent: -9999px">Countries</label>
                            <select class="form-control" id="countries">
                                <option value="1">Select Country</option>
                                <option value="AF" data-capital="Kabul">Afghanistan</option>
                                <option value="AX" data-capital="Mariehamn">Aland Islands</option>
                                <option value="AL" data-capital="Tirana">Albania</option>
                                <option value="DZ" data-capital="Algiers">Algeria</option>
                                <option value="AS" data-capital="Pago Pago">American Samoa</option>
                                <option value="AD" data-capital="Andorra la Vella">Andorra</option>
                                <option value="AO" data-capital="Luanda">Angola</option>
                                <option value="AI" data-capital="The Valley">Anguilla</option>
                                <option value="AG" data-capital="St. John's">Antigua and Barbuda</option>
                                <option value="AR" data-capital="Buenos Aires">Argentina</option>
                                <option value="AM" data-capital="Yerevan">Armenia</option>
                                <option value="AW" data-capital="Oranjestad">Aruba</option>
                                <option value="AU" data-capital="Canberra">Australia</option>
                                <option value="AT" data-capital="Vienna">Austria</option>
                                <option value="AZ" data-capital="Baku">Azerbaijan</option>
                                <option value="BS" data-capital="Nassau">Bahamas</option>
                                <option value="BH" data-capital="Manama">Bahrain</option>
                                <option value="BD" data-capital="Dhaka">Bangladesh</option>
                                <option value="BB" data-capital="Bridgetown">Barbados</option>
                                <option value="BY" data-capital="Minsk">Belarus</option>
                                <option value="BE" data-capital="Brussels">Belgium</option>
                                <option value="BZ" data-capital="Belmopan">Belize</option>
                                <option value="BJ" data-capital="Porto-Novo">Benin</option>
                                <option value="BM" data-capital="Hamilton">Bermuda</option>
                                <option value="BT" data-capital="Thimphu">Bhutan</option>
                                <option value="BO" data-capital="Sucre">Bolivia</option>
                                <option value="BQ" data-capital="Kralendijk">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA" data-capital="Sarajevo">Bosnia and Herzegovina</option>
                                <option value="BW" data-capital="Gaborone">Botswana</option>
                                <option value="BR" data-capital="Brasília">Brazil</option>
                                <option value="IO" data-capital="Diego Garcia">British Indian Ocean Territory</option>
                                <option value="BN" data-capital="Bandar Seri Begawan">Brunei Darussalam</option>
                                <option value="BG" data-capital="Sofia">Bulgaria</option>
                                <option value="BF" data-capital="Ouagadougou">Burkina Faso</option>
                                <option value="BI" data-capital="Bujumbura">Burundi</option>
                                <option value="CV" data-capital="Praia">Cabo Verde</option>
                                <option value="KH" data-capital="Phnom Penh">Cambodia</option>
                                <option value="CM" data-capital="Yaoundé">Cameroon</option>
                                <option value="CA" data-capital="Ottawa">Canada</option>
                                <option value="KY" data-capital="George Town">Cayman Islands</option>
                                <option value="CF" data-capital="Bangui">Central African Republic</option>
                                <option value="TD" data-capital="N'Djamena">Chad</option>
                                <option value="CL" data-capital="Santiago">Chile</option>
                                <option value="CN" data-capital="Beijing">China</option>
                                <option value="CX" data-capital="Flying Fish Cove">Christmas Island</option>
                                <option value="CC" data-capital="West Island">Cocos (Keeling) Islands</option>
                                <option value="CO" data-capital="Bogotá">Colombia</option>
                                <option value="KM" data-capital="Moroni">Comoros</option>
                                <option value="CK" data-capital="Avarua">Cook Islands</option>
                                <option value="CR" data-capital="San José">Costa Rica</option>
                                <option value="HR" data-capital="Zagreb">Croatia</option>
                                <option value="CU" data-capital="Havana">Cuba</option>
                                <option value="CW" data-capital="Willemstad">Curaçao</option>
                                <option value="CY" data-capital="Nicosia">Cyprus</option>
                                <option value="CZ" data-capital="Prague">Czech Republic</option>
                                <option value="CI" data-capital="Yamoussoukro">Côte d'Ivoire</option>
                                <option value="CD" data-capital="Kinshasa">Democratic Republic of the Congo</option>
                                <option value="DK" data-capital="Copenhagen">Denmark</option>
                                <option value="DJ" data-capital="Djibouti">Djibouti</option>
                                <option value="DM" data-capital="Roseau">Dominica</option>
                                <option value="DO" data-capital="Santo Domingo">Dominican Republic</option>
                                <option value="EC" data-capital="Quito">Ecuador</option>
                                <option value="EG" data-capital="Cairo">Egypt</option>
                                <option value="SV" data-capital="San Salvador">El Salvador</option>
                                <option value="GQ" data-capital="Malabo">Equatorial Guinea</option>
                                <option value="ER" data-capital="Asmara">Eritrea</option>
                                <option value="EE" data-capital="Tallinn">Estonia</option>
                                <option value="ET" data-capital="Addis Ababa">Ethiopia</option>
                                <option value="FK" data-capital="Stanley">Falkland Islands</option>
                                <option value="FO" data-capital="Tórshavn">Faroe Islands</option>
                                <option value="FM" data-capital="Palikir">Federated States of Micronesia</option>
                                <option value="FJ" data-capital="Suva">Fiji</option>
                                <option value="FI" data-capital="Helsinki">Finland</option>
                                <option value="MK" data-capital="Skopje">Former Yugoslav Republic of Macedonia</option>
                                <option value="FR" data-capital="Paris">France</option>
                                <option value="GF" data-capital="Cayenne">French Guiana</option>
                                <option value="PF" data-capital="Papeete">French Polynesia</option>
                                <option value="TF" data-capital="Saint-Pierre, Réunion">French Southern Territories</option>
                                <option value="GA" data-capital="Libreville">Gabon</option>
                                <option value="GM" data-capital="Banjul">Gambia</option>
                                <option value="GE" data-capital="Tbilisi">Georgia</option>
                                <option value="DE" data-capital="Berlin">Germany</option>
                                <option value="GH" data-capital="Accra">Ghana</option>
                                <option value="GI" data-capital="Gibraltar">Gibraltar</option>
                                <option value="GR" data-capital="Athens">Greece</option>
                                <option value="GL" data-capital="Nuuk">Greenland</option>
                                <option value="GD" data-capital="St. George's">Grenada</option>
                                <option value="GP" data-capital="Basse-Terre">Guadeloupe</option>
                                <option value="GU" data-capital="Hagåtña">Guam</option>
                                <option value="GT" data-capital="Guatemala City">Guatemala</option>
                                <option value="GG" data-capital="Saint Peter Port">Guernsey</option>
                                <option value="GN" data-capital="Conakry">Guinea</option>
                                <option value="GW" data-capital="Bissau">Guinea-Bissau</option>
                                <option value="GY" data-capital="Georgetown">Guyana</option>
                                <option value="HT" data-capital="Port-au-Prince">Haiti</option>
                                <option value="VA" data-capital="Vatican City">Holy See</option>
                                <option value="HN" data-capital="Tegucigalpa">Honduras</option>
                                <option value="HK" data-capital="Hong Kong">Hong Kong</option>
                                <option value="HU" data-capital="Budapest">Hungary</option>
                                <option value="IS" data-capital="Reykjavik">Iceland</option>
                                <option value="IN" data-capital="New Delhi">India</option>
                                <option value="ID" data-capital="Jakarta">Indonesia</option>
                                <option value="IR" data-capital="Tehran">Iran</option>
                                <option value="IQ" data-capital="Baghdad">Iraq</option>
                                <option value="IE" data-capital="Dublin">Ireland</option>
                                <option value="IM" data-capital="Douglas">Isle of Man</option>
                                <option value="IL" data-capital="Jerusalem">Israel</option>
                                <option value="IT" data-capital="Rome">Italy</option>
                                <option value="JM" data-capital="Kingston">Jamaica</option>
                                <option value="JP" data-capital="Tokyo">Japan</option>
                                <option value="JE" data-capital="Saint Helier">Jersey</option>
                                <option value="JO" data-capital="Amman">Jordan</option>
                                <option value="KZ" data-capital="Astana">Kazakhstan</option>
                                <option value="KE" data-capital="Nairobi">Kenya</option>
                                <option value="KI" data-capital="South Tarawa">Kiribati</option>
                                <option value="KW" data-capital="Kuwait City">Kuwait</option>
                                <option value="KG" data-capital="Bishkek">Kyrgyzstan</option>
                                <option value="LA" data-capital="Vientiane">Laos</option>
                                <option value="LV" data-capital="Riga">Latvia</option>
                                <option value="LB" data-capital="Beirut">Lebanon</option>
                                <option value="LS" data-capital="Maseru">Lesotho</option>
                                <option value="LR" data-capital="Monrovia">Liberia</option>
                                <option value="LY" data-capital="Tripoli">Libya</option>
                                <option value="LI" data-capital="Vaduz">Liechtenstein</option>
                                <option value="LT" data-capital="Vilnius">Lithuania</option>
                                <option value="LU" data-capital="Luxembourg City">Luxembourg</option>
                                <option value="MO" data-capital="Macau">Macau</option>
                                <option value="MG" data-capital="Antananarivo">Madagascar</option>
                                <option value="MW" data-capital="Lilongwe">Malawi</option>
                                <option value="MY" data-capital="Kuala Lumpur">Malaysia</option>
                                <option value="MV" data-capital="Malé">Maldives</option>
                                <option value="ML" data-capital="Bamako">Mali</option>
                                <option value="MT" data-capital="Valletta">Malta</option>
                                <option value="MH" data-capital="Majuro">Marshall Islands</option>
                                <option value="MQ" data-capital="Fort-de-France">Martinique</option>
                                <option value="MR" data-capital="Nouakchott">Mauritania</option>
                                <option value="MU" data-capital="Port Louis">Mauritius</option>
                                <option value="YT" data-capital="Mamoudzou">Mayotte</option>
                                <option value="MX" data-capital="Mexico City">Mexico</option>
                                <option value="MD" data-capital="Chișinău">Moldova</option>
                                <option value="MC" data-capital="Monaco">Monaco</option>
                                <option value="MN" data-capital="Ulaanbaatar">Mongolia</option>
                                <option value="ME" data-capital="Podgorica">Montenegro</option>
                                <option value="MS" data-capital="Little Bay, Brades, Plymouth">Montserrat</option>
                                <option value="MA" data-capital="Rabat">Morocco</option>
                                <option value="MZ" data-capital="Maputo">Mozambique</option>
                                <option value="MM" data-capital="Naypyidaw">Myanmar</option>
                                <option value="NA" data-capital="Windhoek">Namibia</option>
                                <option value="NR" data-capital="Yaren District">Nauru</option>
                                <option value="NP" data-capital="Kathmandu">Nepal</option>
                                <option value="NL" data-capital="Amsterdam">Netherlands</option>
                                <option value="NC" data-capital="Nouméa">New Caledonia</option>
                                <option value="NZ" data-capital="Wellington">New Zealand</option>
                                <option value="NI" data-capital="Managua">Nicaragua</option>
                                <option value="NE" data-capital="Niamey">Niger</option>
                                <option value="NG" data-capital="Abuja">Nigeria</option>
                                <option value="NU" data-capital="Alofi">Niue</option>
                                <option value="NF" data-capital="Kingston">Norfolk Island</option>
                                <option value="KP" data-capital="Pyongyang">North Korea</option>
                                <option value="MP" data-capital="Capitol Hill">Northern Mariana Islands</option>
                                <option value="NO" data-capital="Oslo">Norway</option>
                                <option value="OM" data-capital="Muscat">Oman</option>
                                <option value="PK" data-capital="Islamabad">Pakistan</option>
                                <option value="PW" data-capital="Ngerulmud">Palau</option>
                                <option value="PA" data-capital="Panama City">Panama</option>
                                <option value="PG" data-capital="Port Moresby">Papua New Guinea</option>
                                <option value="PY" data-capital="Asunción">Paraguay</option>
                                <option value="PE" data-capital="Lima">Peru</option>
                                <option value="PH" data-capital="Manila">Philippines</option>
                                <option value="PN" data-capital="Adamstown">Pitcairn</option>
                                <option value="PL" data-capital="Warsaw">Poland</option>
                                <option value="PT" data-capital="Lisbon">Portugal</option>
                                <option value="PR" data-capital="San Juan">Puerto Rico</option>
                                <option value="QA" data-capital="Doha">Qatar</option>
                                <option value="CG" data-capital="Brazzaville">Republic of the Congo</option>
                                <option value="RO" data-capital="Bucharest">Romania</option>
                                <option value="RU" data-capital="Moscow">Russia</option>
                                <option value="RW" data-capital="Kigali">Rwanda</option>
                                <option value="RE" data-capital="Saint-Denis">Réunion</option>
                                <option value="BL" data-capital="Gustavia">Saint Barthélemy</option>
                                <option value="SH" data-capital="Jamestown">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN" data-capital="Basseterre">Saint Kitts and Nevis</option>
                                <option value="LC" data-capital="Castries">Saint Lucia</option>
                                <option value="MF" data-capital="Marigot">Saint Martin</option>
                                <option value="PM" data-capital="Saint-Pierre">Saint Pierre and Miquelon</option>
                                <option value="VC" data-capital="Kingstown">Saint Vincent and the Grenadines</option>
                                <option value="WS" data-capital="Apia">Samoa</option>
                                <option value="SM" data-capital="San Marino">San Marino</option>
                                <option value="ST" data-capital="São Tomé">Sao Tome and Principe</option>
                                <option value="SA" data-capital="Riyadh">Saudi Arabia</option>
                                <option value="SN" data-capital="Dakar">Senegal</option>
                                <option value="RS" data-capital="Belgrade">Serbia</option>
                                <option value="SC" data-capital="Victoria">Seychelles</option>
                                <option value="SL" data-capital="Freetown">Sierra Leone</option>
                                <option value="SG" data-capital="Singapore">Singapore</option>
                                <option value="SX" data-capital="Philipsburg">Sint Maarten</option>
                                <option value="SK" data-capital="Bratislava">Slovakia</option>
                                <option value="SI" data-capital="Ljubljana">Slovenia</option>
                                <option value="SB" data-capital="Honiara">Solomon Islands</option>
                                <option value="SO" data-capital="Mogadishu">Somalia</option>
                                <option value="ZA" data-capital="Pretoria">South Africa</option>
                                <option value="GS" data-capital="King Edward Point">South Georgia and the South Sandwich Islands</option>
                                <option value="KR" data-capital="Seoul">South Korea</option>
                                <option value="SS" data-capital="Juba">South Sudan</option>
                                <option value="ES" data-capital="Madrid">Spain</option>
                                <option value="LK" data-capital="Sri Jayawardenepura Kotte, Colombo">Sri Lanka</option>
                                <option value="PS" data-capital="Ramallah">State of Palestine</option>
                                <option value="SD" data-capital="Khartoum">Sudan</option>
                                <option value="SR" data-capital="Paramaribo">Suriname</option>
                                <option value="SJ" data-capital="Longyearbyen">Svalbard and Jan Mayen</option>
                                <option value="SZ" data-capital="Lobamba, Mbabane">Swaziland</option>
                                <option value="SE" data-capital="Stockholm">Sweden</option>
                                <option value="CH" data-capital="Bern">Switzerland</option>
                                <option value="SY" data-capital="Damascus">Syrian Arab Republic</option>
                                <option value="TW" data-capital="Taipei">Taiwan</option>
                                <option value="TJ" data-capital="Dushanbe">Tajikistan</option>
                                <option value="TZ" data-capital="Dodoma">Tanzania</option>
                                <option value="TH" data-capital="Bangkok">Thailand</option>
                                <option value="TL" data-capital="Dili">Timor-Leste</option>
                                <option value="TG" data-capital="Lomé">Togo</option>
                                <option value="TK" data-capital="Nukunonu, Atafu,Tokelau">Tokelau</option>
                                <option value="TO" data-capital="Nukuʻalofa">Tonga</option>
                                <option value="TT" data-capital="Port of Spain">Trinidad and Tobago</option>
                                <option value="TN" data-capital="Tunis">Tunisia</option>
                                <option value="TR" data-capital="Ankara">Turkey</option>
                                <option value="TM" data-capital="Ashgabat">Turkmenistan</option>
                                <option value="TC" data-capital="Cockburn Town">Turks and Caicos Islands</option>
                                <option value="TV" data-capital="Funafuti">Tuvalu</option>
                                <option value="UG" data-capital="Kampala">Uganda</option>
                                <option value="UA" data-capital="Kiev">Ukraine</option>
                                <option value="AE" data-capital="Abu Dhabi">United Arab Emirates</option>
                                <option value="GB" data-capital="London">United Kingdom</option>
                                <option value="UM" data-capital="Washington, D.C.">United States Minor Outlying Islands</option>
                                <option value="US" data-capital="Washington, D.C.">United States of America</option>
                                <option value="UY" data-capital="Montevideo">Uruguay</option>
                                <option value="UZ" data-capital="Tashkent">Uzbekistan</option>
                                <option value="VU" data-capital="Port Vila">Vanuatu</option>
                                <option value="VE" data-capital="Caracas">Venezuela</option>
                                <option value="VN" data-capital="Hanoi">Vietnam</option>
                                <option value="VG" data-capital="Road Town">Virgin Islands (British)</option>
                                <option value="VI" data-capital="Charlotte Amalie">Virgin Islands (U.S.)</option>
                                <option value="WF" data-capital="Mata-Utu">Wallis and Futuna</option>
                                <option value="EH" data-capital="Laayoune">Western Sahara</option>
                                <option value="YE" data-capital="Sana'a">Yemen</option>
                                <option value="ZM" data-capital="Lusaka">Zambia</option>
                                <option value="ZW" data-capital="Harare">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                    <!-- section title end -->
                </div>
                <div class="col-lg-6">
                    <!-- section title -->
                    <div class="section-image style2">
                        <img class="img-fluid" src="images/world-map.png" alt="image">
                    </div>
                    <!-- section title end -->
                </div>
            </div>
            <!-- row end -->
        </div>
    </section>
    <!--features-section-->

    <!--services-section-->
    <section class="cmt-row services-section cmt-bgcolor-darkgrey bg-img3 cmt-bg cmt-bgimage-yes clearfix">
        <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h2 class="title">We Provide Experts Create Great<br> Value for<strong> Visa Services for Country</strong></h2>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div><!-- row end -->
            <!-- row -->
            <div class="row mb-40 res-991-mb-15">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--featured-icon-box-->
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="flaticon-bussiness-man"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Courier</h5>
                            </div>
                            <div class="featured-desc">
                                <p>For the persons whose jobs require a minimum work experience that are not temporary or seasonal.</p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor" href="services.html">View more</a>
                        </div>
                    </div><!-- featured-icon-box end-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--featured-icon-box-->
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="flaticon-passport-3"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Enquiry</h5>
                            </div>
                            <div class="featured-desc">
                                <p>People who want to invest in, or start businesses abroad. Expected to support the development.</p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor" href="services.html">View more</a>
                        </div>
                    </div><!-- featured-icon-box end-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--featured-icon-box-->
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="flaticon-visa-1"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Requirements</h5>
                            </div>
                            <div class="featured-desc">
                                <p>We consult for the permanent residents visa documents issued to immigrants under the Immigration.</p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor" href="services.html">View more</a>
                        </div>
                    </div><!-- featured-icon-box end-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--featured-icon-box-->
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="flaticon-insurance"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Services</h5>
                            </div>
                            <div class="featured-desc">
                                <p>We guide our clients for the perception & better career opportunities for the students, Overseas services</p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor" href="services.html">View more</a>
                        </div>
                    </div><!-- featured-icon-box end-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--featured-icon-box-->
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="flaticon-passport-11"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Combo</h5>
                            </div>
                            <div class="featured-desc">
                                <p>Permit To Work refers to management systems used to ensure that work is done safely and efficiently.</p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor" href="services.html">View more</a>
                        </div>
                    </div><!-- featured-icon-box end-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--featured-icon-box-->
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="flaticon-plane-tickets"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Visitor Visa</h5>
                            </div>
                            <div class="featured-desc">
                                <p>Visas for the people who want to travel to and enter as a visitor for up to 6 months. We stick the visitor visa.</p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor" href="services.html">View more</a>
                        </div>
                    </div><!-- featured-icon-box end-->
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!--services-section-->

    <!--- conatact-section -->
    <section class="cmt-row conatact-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cmt-col-bgcolor-yes cmt-bg cmt-bgcolor-white z-index-2 spacing-7 box-shadow">
                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                        <div class="row ">
                            <div class="col-lg-4 col-md-5">
                                <div class="cmt-bgcolor-darkgrey pt-30 pb-30 pl-30 pr-30">
                                    <div class="mb-20">
                                        <h4>Pretoria Address</h4>
                                        <p>Suite 4B Schoeman street forum building, 1157 Francis Baard street Hatfield, Pretoria.</p>
                                    </div>
                                    <div class="cmt-textcolor-white">Email: <a href="mailto:visa@visarequest.co.za">visa@visarequest.co.za</a></div>
                                </div>
                                <div class="cmt-bgcolor-skincolor pt-30 pb-25 pl-30 pr-30">
                                    <h5 class="font-weight-normal">Cell Phone</h5>
                                    <div class="d-flex align-items-center pt-10">
                                        <div class="cmt-icon cmt-icon_element-border cmt-icon_element-color-white cmt-icon_element-size-xs cmt-icon_element-style-rounded mb-10 mr-15">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <h4>082-733-5236</h4>
                                    </div>
                                    <h5 class="font-weight-normal">International Calls</h5>
                                    <div class="d-flex align-items-center pt-10">
                                        <div class="cmt-icon cmt-icon_element-border cmt-icon_element-color-white cmt-icon_element-size-xs cmt-icon_element-style-rounded mb-10 mr-15">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <h4>+27 12 342 5674</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="pl-30 res-991-pl-0 res-767-mt-30">
                                    <!-- section title -->
                                    <div class="section-title with-desc clearfix">
                                        <div class="title-header">
                                            <h2 class="title">Contact <strong>VisaRequest</strong></h2>
                                        </div>
                                    </div><!-- section title end -->
                                    <form id="contact_form" class="contact_form wrap-form pt-15 clearfix" method="post" novalidate="novalidate" action="#">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="name" type="text" value="" placeholder="Your Name" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="address" type="text" value="" placeholder="Your Email" required="required"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="phone" type="text" value="" placeholder="Phone Number" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="phone" type="text" value="" placeholder="Subject" required="required"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <label>
                                            <span class="text-input"><textarea name="message" rows="5" placeholder="Message" required="required"></textarea></span>
                                        </label>
                                        <button class="submit cmt-btn cmt-btn-size-lg cmt-btn-shape-rounded cmt-btn-style-border cmt-btn-color-dark w-100" type="submit">Submit Request !</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- conatact-section end -->

    <!--team-section-->
    <section class="cmt-row team-section clearfix">
        <div class="container">
            <!-- section title -->
            <div class="section-title title-style-center_text">
                <div class="title-header">
                    <h5>Skillful Professionals</h5>
                    <h2 class="title">Meet Our <strong>Dedicated Team!</strong></h2>
                </div>
            </div><!-- section title end -->
            <!-- row -->
            <div class="row slick_slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":991,"settings":{"slidesToShow": 3}}, {"breakpoint":678,"settings":{"slidesToShow": 2}}, {"breakpoint":460,"settings":{"slidesToShow": 1}}]}'>
                <div class="cmt-box-col-wrapper col-lg-4">
                    <!-- featured-imagebox-team -->
                    <div class="featured-imagebox featured-imagebox-team bor_rad_5">
                        <div class="cmt-team-box-view-overlay">
                            <div class="featured-iconbox cmt-media-link">
                                <div class="media-block">
                                    <ul class="social-icons">
                                        <li class="social-twitter"><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                                        <li class="social-facebook"><a href="#"><i class="ti ti-facebook"></i></a></li>
                                        <li class="social-instagram"><a href="#"><i class="ti ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="images/team-member/team-img01.jpg" alt="image">
                            </div>
                        </div>
                        <div class="featured-content featured-content-team">
                            <div class="featured-title">
                                <h5><a href="team-details.html">Jaco Badenhorst</a></h5>
                            </div>
                            <div class="team-position">Migration Agent</div>
                        </div>
                    </div><!-- featured-imagebox-team end-->
                </div>
                <div class="cmt-box-col-wrapper col-lg-4">
                    <!-- featured-imagebox-team -->
                    <div class="featured-imagebox featured-imagebox-team bor_rad_5">
                        <div class="cmt-team-box-view-overlay">
                            <div class="featured-iconbox cmt-media-link">
                                <div class="media-block">
                                    <ul class="social-icons">
                                        <li class="social-twitter"><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                                        <li class="social-facebook"><a href="#"><i class="ti ti-facebook"></i></a></li>
                                        <li class="social-instagram"><a href="#"><i class="ti ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="images/team-member/team-img02.jpg" alt="image">
                            </div>
                        </div>
                        <div class="featured-content featured-content-team">
                            <div class="featured-title">
                                <h5><a href="team-details.html">Els Badenhorst</a></h5>
                            </div>
                            <div class="team-position">Finance</div>
                        </div>
                    </div><!-- featured-imagebox-team end-->
                </div>
                <div class="cmt-box-col-wrapper col-lg-4">
                    <!-- featured-imagebox-team -->
                    <div class="featured-imagebox featured-imagebox-team bor_rad_5">
                        <div class="cmt-team-box-view-overlay">
                            <div class="featured-iconbox cmt-media-link">
                                <div class="media-block">
                                    <ul class="social-icons">
                                        <li class="social-twitter"><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                                        <li class="social-facebook"><a href="#"><i class="ti ti-facebook"></i></a></li>
                                        <li class="social-instagram"><a href="#"><i class="ti ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="images/team-member/team-img03.jpg" alt="image">
                            </div>
                        </div>
                        <div class="featured-content featured-content-team">
                            <div class="featured-title">
                                <h5><a href="team-details.html">Vincent Mutezo</a></h5>
                            </div>
                            <div class="team-position">Director: Marketing</div>
                        </div>
                    </div><!-- featured-imagebox-team end-->
                </div>
                <div class="cmt-box-col-wrapper col-lg-4">
                    <!-- featured-imagebox-team -->
                    <div class="featured-imagebox featured-imagebox-team bor_rad_5">
                        <div class="cmt-team-box-view-overlay">
                            <div class="featured-iconbox cmt-media-link">
                                <div class="media-block">
                                    <ul class="social-icons">
                                        <li class="social-twitter"><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                                        <li class="social-facebook"><a href="#"><i class="ti ti-facebook"></i></a></li>
                                        <li class="social-instagram"><a href="#"><i class="ti ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="images/team-member/team-img04.jpg" alt="image">
                            </div>
                        </div>
                        <div class="featured-content featured-content-team">
                            <div class="featured-title">
                                <h5><a href="team-details.html">Aamena Joosub</a></h5>
                            </div>
                            <div class="team-position">Director: Management</div>
                        </div>
                    </div><!-- featured-imagebox-team end-->
                </div>
                <div class="cmt-box-col-wrapper col-lg-4">
                    <!-- featured-imagebox-team -->
                    <div class="featured-imagebox featured-imagebox-team bor_rad_5">
                        <div class="cmt-team-box-view-overlay">
                            <div class="featured-iconbox cmt-media-link">
                                <div class="media-block">
                                    <ul class="social-icons">
                                        <li class="social-twitter"><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                                        <li class="social-facebook"><a href="#"><i class="ti ti-facebook"></i></a></li>
                                        <li class="social-instagram"><a href="#"><i class="ti ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="images/team-member/team-img05.jpg" alt="image">
                            </div>
                        </div>
                        <div class="featured-content featured-content-team">
                            <div class="featured-title">
                                <h5><a href="team-details.html">Madelein De Jager</a></h5>
                            </div>
                            <div class="team-position">Visas</div>
                        </div>
                    </div><!-- featured-imagebox-team end-->
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!--team-section end-->

    <!--client-section-->
    <div class="cmt-row client-section cmt-bgcolor-grey cmt-bg cmt-bgimage-yes bg-img7 cmt-bg-pattern border-bottom clearfix">
        <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="container">
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-lg-4 d-md-none d-lg-block">
                    <div class="section-title">
                        <div class="title-header">
                            <h5>VisaRequest</h5>
                            <h2 class="title"><strong>Clients</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- slick_slider -->
                    <div class="slick_slider row" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 4}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}}, {"breakpoint":575,"settings":{"slidesToShow": 2}}, {"breakpoint":380,"settings":{"slidesToShow": 1}}]}'>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-01">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-01.png" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-02">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-02.png" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-03">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-03.png" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-04">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-04.png" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-05">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-05.png" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-06">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-03.png" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-02">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-02.png" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip" data-tooltip="client-04">
                                <div class="client-thumbnail">
                                    <img class="img-fluid" src="images/client/client-04.png" alt="image">
                                </div>
                            </div>
                        </div>
                    </div><!-- cmt-client end -->
                </div>
            </div><!-- row end -->
        </div>
    </div>
    <!--client-section end-->

</div>
<!--site-main end-->
@endsection()