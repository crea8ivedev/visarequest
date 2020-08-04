@extends('frontend.layouts.app')
@section('content')

<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"><a href="services.html">Terms & Conditions</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-main">
    <section class="cmt-row clearfix tc">
        <div class="container">
            <div class="row">
                {!! $termsAndConditions->description ?? '' !!}
            </div>
        </div>
    </section>
</div>
@endsection()