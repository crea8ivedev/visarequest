@extends('frontend.layouts.app')
@section('content')
<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"><a href="services.html">Contact</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-main">

    <!--google_map-->
    <section class="google-map">
        <iframe src="https://www.google.com/maps/embed?pb={{$comman_address->address}}" frameborder="0"
            style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>


    <!--- conatact-section -->
    <section class="cmt-row conatact-section clearfix ctbox">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cmt-col-bgcolor-yes cmt-bg cmt-bgcolor-white z-index-2 spacing-7 box-shadow ctbox-row">
                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-7">

                                <div class="pl-30 res-991-pl-0 res-767-mt-30">
                                    <div class="alertMessage pb-5 text-success"></div>

                                    <!-- section title -->
                                    <div class="section-title with-desc clearfix">
                                        <div class="title-header">
                                            <h2 class="title">Contact <strong>Us</strong></h2>
                                        </div>
                                    </div><!-- section title end -->
                                    <form id="contact_form" class="contact_form wrap-form pt-15 clearfix" method="post"
                                        novalidate="novalidate" action="#">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="name" type="text" value=""
                                                            placeholder="Your Name" required="required"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label>
                                                    <span class="text-input"><input name="email" type="text" value=""
                                                            placeholder="Your Email" required="required"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <label>
                                            <span class="text-input"><textarea name="message" rows="5"
                                                    placeholder="Message" required="required"></textarea></span>
                                        </label>
                                        <button disabled
                                            class="submit  disableBtn cmt-btn cmt-btn-size-lg cmt-btn-shape-rounded cmt-btn-style-border cmt-btn-color-dark w-100"
                                            type="submit">Submit Request !</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </section>
    <!-- conatact-section end -->

    <section class="cmt-row cta-section res-991-mt-0 clearfix ctsection mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row res-991-mt-0">
                        @foreach($address_list as $key=>$list)

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <!--featured-icon-box-->
                            <div
                                class="featured-icon-box icon-align-before-content @if($key%2==0) cmt-bgcolor-darkgrey @else cmt-bgcolor-skincolor @endif icon-ver_align-top style6 h-100">
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
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@include('frontend.layouts.footer')
@endsection
@section('scripts')
<script src="{{ asset('js/contact.js') }}" type="text/javascript"></script>
@endsection