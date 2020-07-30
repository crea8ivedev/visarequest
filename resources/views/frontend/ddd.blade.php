@extends('frontend.layouts.app')

@section('styles')
<link href="{{asset('css/map.css' )}}"  rel="stylesheet" type="text/css">
@endsection

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
                            <select class="form-control country" id="select_country">
                                <option value="1">Select Country</option>
                                @foreach($country_list as $list)
                                <option value="{{strtolower($list->name)}}">{{$list->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- section title end -->
                </div>
                <div class="col-lg-6">
                    <!-- section title -->
                    <div id="word">
                        <div id="vmap"  class="" style="width: 100%; height: 500px;"></div>
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
                @foreach($service_category_list as $category)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class=" featured-icon-box icon-align-top-content style5 border bor_rad_3">
                        <div class="featured-icon">
                            <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="{{$category->icon}}" aria-hidden="true"></i>

                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>{{$category->name}}</h5>
                            </div>
                            <div class="featured-desc">
                                <p>{{$category->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

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
                                    <div id="showResponseArea" class="showResponseArea alert d-none">
                                        <span>
                                            <strong id="alertType">Success !! </strong> <span id="requestId"> // Request id goes here</span>
                                        </span>
                                    </div>
                                    <form id="contact_form" class="contact_form wrap-form pt-15 clearfix" method="post" novalidate="novalidate" >
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="name" type="text" value="" placeholder="Your Name" ></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="email" type="email" value="" placeholder="Your Email" ></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="phone" type="text" value="" placeholder="Phone Number" ></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="subject" type="text" value="" placeholder="Subject" required="required"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <label>
                                            <span class="text-input"><textarea name="message" rows="5" placeholder="Message" required="required"></textarea></span>
                                        </label>
                                        <button class="submit cmt-btn cmt-btn-size-lg cmt-btn-shape-rounded cmt-btn-style-border cmt-btn-color-dark w-100" type="submit">Submit Request !  <i id="submit" class="fa fa-spinner fa-spin d-none" ></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cmt-row team-section clearfix">
        <div class="container">
            <div class="section-title title-style-center_text">
                <div class="title-header">
                    <h5>Skillful Professionals</h5>
                    <h2 class="title">Meet Our <strong>Dedicated Team!</strong></h2>
                </div>
            </div>
            <div class="row slick_slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":991,"settings":{"slidesToShow": 3}}, {"breakpoint":678,"settings":{"slidesToShow": 2}}, {"breakpoint":460,"settings":{"slidesToShow": 1}}]}'>
                @foreach($member_list as $member)
                <div class="cmt-box-col-wrapper col-lg-4">
                    <div class="featured-imagebox featured-imagebox-team bor_rad_5">
                        <div class="cmt-team-box-view-overlay">
                            <div class="featured-iconbox cmt-media-link">
                                <div class="media-block">
                                    <ul class="social-icons">
                                        <li class="social-twitter"><a href="{{$member->twitter}}"><i class="ti ti-twitter-alt"></i></a></li>
                                        <li class="social-facebook"><a href="{{$member->facebook}}"><i class="ti ti-facebook"></i></a></li>
                                        <li class="social-instagram"><a href="{{$member->instagram}}"><i class="ti ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="images/team-member/team-img01.jpg" alt="image">
                            </div>
                        </div>
                        <div class="featured-content featured-content-team">
                            <div class="featured-title">
                                <h5><a href="team-details.html">{{$member->name}}</a></h5>
                            </div>
                            <div class="team-position">{{$member->position}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/home.js') }}" type="text/javascript" ></script>
<script src="{{ asset('js/map/jquery.vmap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/map/jquery.vmap.world.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/map/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/map/init_map.js') }}" type="text/javascript"></script>
@foreach(config('layout.resources.validate_js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
{!! JsValidator::formRequest('App\Http\Requests\Frontend\ContactRequest') !!}
<script src="{{ asset('js/contact.js') }}" type="text/javascript" ></script>
<script>
    $( document ).ready(function() {
        $(".select2").select2();
    $('body').on('change','.country',function() {
            var country = $('#select_country').val();
            if(country != '') {
            var url = '{{ route("frontend.service.country", ":country") }}';
            url     = url.replace(':country', country);
            window.location.href = url;
            }
        });
    });
</script>
@endsection