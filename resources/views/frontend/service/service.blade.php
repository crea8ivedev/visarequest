@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"><a href="services.html">Our Services</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-main">
    <section class="cmt-row services-section cmt-bgcolor-grey bg-img3 cmt-bg cmt-bgimage-yes clearfix">
        <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h5>WHAT WE DO</h5>
                            <h2 class="title">Services offered by <strong>VisaRequest</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row res-991-mb-15">
                @foreach($service_category_list as $category)
                <div class="col-lg-4 col-md-6 col-sm-6">
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
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
<script type="text/javascript" src="{{ asset('js/service.js') }}"></script>
<script>
    var serviceUrl = '{{ route("frontend.service.country", ":country") }}';
</script>
@endsection