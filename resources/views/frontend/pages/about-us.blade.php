@extends('frontend.layouts.app')
@section('content')


<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"><a href="services.html">About</a></h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-title end -->



<!--site-main start-->
<div class="site-main">

    <!--about-section-->
    <section class="cmt-row about_2-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="ttm_single_image-wrapper">
                        <img class="img-fluid" src="{{ asset('images/about-us.jpg') }}" alt="About Us">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pt-15 res-991-pt-30">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h5>About Us</h5>
                                <h2 class="title">Welcome to <strong>VisaRequest</strong></h2>
                            </div>
                        </div><!-- section title end -->
                        <p>
                            {!! $aboutUs->description ?? '' !!}
                        </p>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </section>

</div>
<!--site-main end-->
<!--site-main end-->
@include('frontend.layouts.footer')

@endsection