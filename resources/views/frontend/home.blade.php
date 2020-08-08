@extends('frontend.layouts.app')
@section('content')

<section class="main_banner">
    <div class="container-fluid h-100 p-0">
        <div class="row h-100">
            <div class="col-lg-12 h-100">
                <div id="main-banner" class="owl-carousel owl-theme h-100">
                    @foreach($sliders as $list)
                    <div class="item h-100">
                        <img src="{{ route('display.image',[config("constants.IMAGES.SLIDER_IMAGE"),$list->image]) }}"
                            width="1920" height="450" alt="{{$list->name}}" class="img-fluid object-fit">
                        <div class="overlay">
                            <h2>
                                {!! $list->text !!}
                            </h2>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END REVOLUTION SLIDER -->

<!--site-main start-->
<div class="site-main">

    <!--zero_padding-section-->
    <section class="cmt-row zero_padding-section bg-layer-equal-height cmt-bgcolor-grey clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt_50 res-991-mt-0">
                        <div class="row no-gutters">
                            <div class="col-lg-5 col-md-6 mx-auto">
                                <div class="cmt-bgcolor-skincolor mt_10 pt-10 res-991-mt-0"></div>
                                <!-- col-img-img-four -->
                                <div class="col-bg-img-four cmt-bg cmt-col-bgimage-yes">
                                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer">
                                        <div class="cmt-col-wrapper-bg-layer-inner"></div>
                                    </div>
                                </div>
                                <!-- col-img-bg-img-four end-->
                                <img src="images/How-to-Get-a-Visa-Application-Quickly.jpg"
                                    class="img-fluid cmt-equal-height-image" alt="bg-image">
                            </div>
                            <div class="col-lg-7">
                                <div class="cmt-bg cmt-col-bgcolor-yes cmt-bgcolor-white spacing-4 z-index-1">
                                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                                    <div class="layer-content">
                                        <!-- section title -->
                                        <div class="section-title">
                                            <div class="title-header">
                                                <h5>VisaRequest</h5>
                                                <h2 class="title">Select a country to view <strong>the services
                                                        offered</strong></h2>
                                            </div>
                                        </div><!-- section title end -->
                                        <p>We are an expert visa consultant focusing on providing quick services to all
                                            your travelling needs. Be it a visa, travel insurance, flight ticketing, we
                                            cover it all.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div
                                                    class="featured-icon-box icon-align-before-content icon-ver_align-top pt-20">
                                                    <div class="featured-icon">
                                                        <div
                                                            class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-md">
                                                            <i class="flaticon-contract"></i>
                                                        </div>
                                                    </div>
                                                    <div class="featured-content">
                                                        <div class="featured-title">
                                                            <h5>Visa Consultation</h5>
                                                        </div>
                                                        <div class="featured-desc">
                                                            <p>knowledge of immigration rules better than anyone</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="featured-icon-box icon-align-before-content icon-ver_align-top pt-20">
                                                    <div class="featured-icon">
                                                        <div
                                                            class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-md">
                                                            <i class="flaticon-certificate"></i>
                                                        </div>
                                                    </div>
                                                    <div class="featured-content">
                                                        <div class="featured-title">
                                                            <h5>Professional Agents</h5>
                                                        </div>
                                                        <div class="featured-desc">
                                                            <p>Skilled professional are available to the help</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cmt-horizontal_sep width-100 mt-30 mb-35"></div>
                                        <div class="d-flex align-items-center">
                                            <label for="countries" class="lead"
                                                style="text-indent: -9999px">Countries</label>
                                            <select class="form-control country" id="countries">
                                                <option value="">Select Country</option>
                                                @foreach($country_list as $list)
                                                <option data-capital="{{$list->flag}}"
                                                    value="{{($list->slug)?strtolower($list->slug):strtolower($list->name)}}">
                                                    {{ucfirst($list->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!--zero_padding-section end-->

    <!--services-section-->
    <section class="cmt-row services-section cmt-bgcolor-grey bg-img3 cmt-bg cmt-bgimage-yes clearfix">
        <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h5>WHAT WE DO</h5>
                            <h2 class="title">Services offered by <strong>VisaRequest</strong></h2>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div><!-- row end -->
            <!-- row -->
            <div class="row res-991-mb-15">
                @foreach($service_category_list as $category)

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--featured-icon-box-->
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div
                                class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="{{$category->icon}}"></i>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>{{$category->name}}</h5>
                            </div>
                            <div class="featured-desc">
                                <p>{{$category->description}}</p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor" href="#"
                                data-toggle="modal" data-target="#modalService">View more</a>
                        </div>
                    </div><!-- featured-icon-box end-->
                </div>
                @endforeach
            </div><!-- row end -->
        </div>
    </section>
    <!--services-section-->

    <section class="cmt-row cta-section clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div
                        class="cmt-col-bgcolor-yes cmt-bgcolor-skincolor cmt-col-bgimage-yes cmt-bg col-bg-img-two cmt-bg-pattern spacing-2 mt-0">
                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer">
                            <div class="cmt-col-wrapper-bg-layer-inner"></div>
                        </div>
                        <div class="row cmt-vertical_sep">
                            <div class="col-lg-4 col-md-4 col-sm-6 cmt-box-col-wrapper">
                                <!-- cmt-fid -->
                                <div class="cmt-fid inside cmt-fid-with-icon cmt-fid-view-lefticon text-center">
                                    <div class="cmt-fid-icon-wrapper cmt-textcolor-white">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="cmt-fid-contents">
                                        <h4 class="cmt-fid-inner">
                                            <span data-appear-animation="animateDigits" data-from="0" data-to="15"
                                                data-interval="3" data-before="" data-before-style="sup" data-after=""
                                                data-after-style="sub" class="numinate">15
                                            </span>
                                            <sub>+</sub>
                                        </h4>
                                        <h3 class="cmt-fid-title">Years Of Experience</h3>
                                    </div>
                                </div><!-- cmt-fid end -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 cmt-box-col-wrapper">
                                <!-- cmt-fid -->
                                <div class="cmt-fid inside cmt-fid-with-icon cmt-fid-view-lefticon text-center">
                                    <div class="cmt-fid-icon-wrapper cmt-textcolor-white">
                                        <i class="fa fa-smile-o"></i>
                                    </div>
                                    <div class="cmt-fid-contents">
                                        <h4 class="cmt-fid-inner">
                                            <span data-appear-animation="animateDigits" data-from="0" data-to="1490"
                                                data-interval="15" data-before="" data-before-style="sup" data-after=""
                                                data-after-style="sub" class="numinate">1490
                                            </span>
                                            <sub>+</sub>
                                        </h4>
                                        <h3 class="cmt-fid-title">Clients Assisted</h3>
                                    </div>
                                </div><!-- cmt-fid end -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 cmt-box-col-wrapper">
                                <!-- cmt-fid -->
                                <div class="cmt-fid inside cmt-fid-with-icon cmt-fid-view-lefticon text-center">
                                    <div class="cmt-fid-icon-wrapper cmt-textcolor-white">
                                        <i class="flaticon-visa-1"></i>
                                    </div>
                                    <div class="cmt-fid-contents">
                                        <h4 class="cmt-fid-inner">
                                            <span data-appear-animation="animateDigits" data-from="0" data-to="850"
                                                data-interval="15" data-before="" data-before-style="sup" data-after=""
                                                data-after-style="sub" class="numinate">850
                                            </span>
                                            <sub>+</sub>
                                        </h4>
                                        <h3 class="cmt-fid-title">Successful Visas</h3>
                                    </div>
                                </div><!-- cmt-fid end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cmt-row cta-section clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-3 p-0">
                    <!-- featured-imagebox -->
                    <div class="featured-icon-box m-0">
                        <div class="featured-icon text-center">
                            <img src="images/20200726_095648_0003.jpg" class="img-fluid object-fit">
                        </div>
                    </div><!-- featured-imagebox end-->
                </div>
                <div class="col-sm-6 col-md-3 p-0">
                    <!-- featured-imagebox -->
                    <div class="featured-icon-box m-0">
                        <div class="featured-icon text-center">
                            <img src="images/20200726_075929_0000.jpg" class="img-fluid object-fit">
                        </div>
                    </div><!-- featured-imagebox end-->
                </div>
                <div class="col-sm-6 col-md-3 p-0">
                    <!-- featured-imagebox -->
                    <div class="featured-icon-box m-0">
                        <div class="featured-icon text-center">
                            <img src="images/20200726_091706_0001.jpg" class="img-fluid object-fit">
                        </div>
                    </div><!-- featured-imagebox end-->
                </div>
                <div class="col-sm-6 col-md-3 p-0">
                    <!-- featured-imagebox -->
                    <div class="featured-icon-box m-0">
                        <div class="featured-icon text-center">
                            <img src="images/20200726_094951_0000.jpg" class="img-fluid object-fit">
                        </div>
                    </div><!-- featured-imagebox end-->
                </div>
            </div>
        </div>
    </section>

    <!--- conatact-section -->
    <section class="cmt-row conatact_2-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cmt-col-bgcolor-yes cmt-bg cmt-bgcolor-grey z-index-2 spacing-7 mt-0 box-shadow">
                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pr-30 res-991-pr-0 res-991-mb-30">
                                    <!-- section title -->
                                    <div class="section-title with-desc title-style-center_text">
                                        <div class="title-header">
                                            <h5>why choose us</h5>
                                            <h2 class="title">Have Be Any Question? <strong>Contact Us</strong></h2>
                                        </div>
                                        <div class="title-desc">
                                            <p class="mb-0">The Most Eminent Visas and Immigration Consultant service
                                                provider.</p>
                                            <p>Foundation was established with a small idea that was incepted in the
                                                minds of its promoters in the year 1994! We skillfully.</p>
                                        </div>
                                    </div><!-- section title end -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="alertMessage pb-5 text-success"></div>
                                <form id="contact_form" class="contact_form wrap-form clearfix" method="post"
                                    novalidate="novalidate" action="#">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value=""
                                                        placeholder="Your Name" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="email" type="text" value=""
                                                        placeholder="Your Email" required="required"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label>
                                        <span class="text-input"><textarea name="message" rows="4" placeholder="Message"
                                                required="required"></textarea></span>
                                    </label>
                                    <button disabled
                                        class="submit disableBtn cmt-btn cmt-btn-size-lg cmt-btn-shape-rounded cmt-btn-style-border cmt-btn-color-dark w-100"
                                        type="submit">Submit Request !</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="qLink">
                                    <ul>
                                        @foreach($visaQuestion as $key=>$value)
                                        <li><a target="_blank" href="{{$value->value}}"><i
                                                    class="cmt-textcolor-skincolor fa fa-check-circle"></i>{{$value->lable}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>
    <!-- conatact-section end -->

    <section class="cmt-row cta-section res-991-mt-0 clearfix ctsection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row res-991-mt-0">
                        @foreach($address as $key=>$list)

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <!--featured-icon-box-->
                            <div
                                class="featured-icon-box icon-align-before-content  {{ ($key%2==0) ? 'cmt-bgcolor-darkgrey' : 'cmt-bgcolor-skincolor' }} icon-ver_align-top style6 h-100">
                                <div class="featured-content pl-10 pr-10">
                                    <div class="featured-icon mb-20">
                                        <div
                                            class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-md">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                    </div>
                                    <div class="featured-title">
                                        <h5>{{$list->office_name}}</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Email: <a href="mailto:{{$list->email}}"> {{$list->email}}</a></p>
                                        <p>
                                            {{$list->address}}
                                        </p>

                                        @if($list->cell_phone)
                                        <p>
                                            Cell Phone: <a href="tel:{{$list->cell_phone}}"> {{$list->cell_phone}}</a>
                                        </p>
                                        @endif
                                        @if($list->telephone)
                                        <p>
                                            Telephone: <a href="tel:{{$list->telephone}}"> {{$list->telephone}}</a>
                                        </p>
                                        @endif
                                        @if($list->international_call)
                                        <p>
                                            International Calls: <a href="tel:{{$list->international_call}}">
                                                {{$list->international_call}}</a>
                                        </p>
                                        @endif
                                        <p>
                                            Hours: {{$list->hours}}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--team-section-->
    <section class="cmt-row team-section clearfix">
        <div class="container">
            <!-- section title -->
            <div class="section-title title-style-center_text">
                <div class="title-header">
                    <h5>SKILLFUL PROFESSIONALS</h5>
                    <h2 class="title">Meet our <strong>Visa Experts</strong></h2>
                </div>
            </div><!-- section title end -->
            <!-- row -->
            <div class="row slick_slider"
                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":true, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":991,"settings":{"slidesToShow": 3}}, {"breakpoint":678,"settings":{"slidesToShow": 2}}, {"breakpoint":460,"settings":{"slidesToShow": 1}}]}'>
                @foreach($member_list as $member)
                <div class="cmt-box-col-wrapper col-lg-4">
                    <div class="featured-imagebox featured-imagebox-team bor_rad_5">
                        <div class="cmt-team-box-view-overlay">
                            <div class="featured-thumbnail">
                                @if($member->file)
                                <img class="img-fluid"
                                    src="{{ route('display.image',[config("constants.IMAGES.TEAM_MEMBER_IMAGE"),$member->file]) }}"
                                    alt="{{$member->name}}">
                                @else
                                <img class="img-fluid" src="{{ asset('images/member.jpg') }}" alt="member">

                                @endif

                            </div>
                        </div>
                        <div class="featured-content featured-content-team">
                            <div class="featured-title">
                                <h5><a href="team-details.html">{{$member->name}}</a></h5>
                            </div>
                            <div class="team-position">{{$member->position}}</div>
                            @if($member->email)
                            <div class="team-position">Email: <a href="mailto:{{$member->email}}">{{$member->email}}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!-- row end -->
        </div>
    </section>
    <!--team-section end-->

    <!--client-section-->
    <section class="client-section-mn">
        <!-- section title -->
        <!-- section title end -->
    </section>
    <div
        class="cmt-row client-section cmt-bgcolor-grey cmt-bg cmt-bgimage-yes bg-img7 cmt-bg-pattern border-bottom clearfix">
        <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="section-title title-style-center_text pt-30">
            <div class="title-header">
                <h5>Our Amazing</h5>
                <h2 class="title">VisaRequest Corporate <strong>Clients</strong></h2>
            </div>
        </div>
        <div class="container">
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- slick_slider -->
                    <div class="slick_slider row"
                        data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":true, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 4}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}}, {"breakpoint":575,"settings":{"slidesToShow": 2}}, {"breakpoint":380,"settings":{"slidesToShow": 1}}]}'>
                        @foreach($visaClients as $key=>$list)
                        <div class="client-box">
                            <div class="cmt-client-logo-tooltip">
                                <div class="client-thumbnail">
                                    <img class="img-fluid"
                                        src="{{ route('display.image',[config("constants.IMAGES.VISA_CLIENT_IMAGE"),$list->file]) }}"
                                        alt="{{$list->title}}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- cmt-client end -->
                </div>
            </div><!-- row end -->
        </div>
    </div>
    <!--client-section end-->

</div>
<!--site-main end-->

@include('frontend.layouts.footer')
@endsection
@section('scripts')
<script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/home.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/contact.js') }}" type="text/javascript"></script>

@endsection