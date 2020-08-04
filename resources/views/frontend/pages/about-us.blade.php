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
                {!! $aboutUs->description ?? '' !!}

            </div><!-- row end -->
        </div>
    </section>

</div>
<!--site-main end-->
@endsection()