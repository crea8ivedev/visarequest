@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title">Visa Application Services for visiting
                            <strong>{{$country->name}}</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-title end -->
<!--Select Country Start-->
<section class="cmt-bgcolor-skincolor services-row">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="country-bx">
                    <div class="country-img">
                        @if($country->tourist_image)
                        <img
                            src="{{ route('display.image',[config("constants.IMAGES.COUNTRY_TOURIST_IMAGE"),$country->tourist_image]) }}">
                        @else
                        <img src="../images/ind.jpg">
                        @endif
                    </div>
                    <div class="country-info-btm">
                        <div class="country-flag-img">
                            <img
                                src="{{ route('display.image',[config("constants.IMAGES.COUNTRY_IMAGE"),$country->flag]) }}">
                        </div>
                        <h5>{{$country->name}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="country-info">
                    <div class="section-title">
                        <div class="title-header">
                            <h2 class="title">Select a country to view <strong>the services</strong></h2>
                        </div>
                    </div>
                    <p>
                        We are an expert visa consultant focusing on providing quick services to all your travelling
                        needs. Be it a visa, travel insurance, flight ticketing, we cover it all.
                    </p>
                    <div class="d-flex align-items-center">
                        <label for="countries3" class="lead" style="text-indent: -9999px">Countries</label>
                        <select class="form-control country" id="countries">
                            <option value="">Select Country</option>
                            @foreach($country_list as $list)
                            <option data-capital="{{$list->flag}}" value="{{$list->slug}}" @if($list->id===$country->id) selected="selected" @endif>
                                {{$list->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Select Country End-->

<!-- Category Start -->
<section class="category-row">
    <div class="container">
        <nav class="main-menu menu-mobile m-auto" id="menu">
            <ul class="menu category-list">
                @foreach($service_category_list as $list)
                <li data-id="{{$list->id}}" class="mega-menu-item service-category">
                    <a href="javascript:void(0);"
                        class="mega-menu-link   {{($list->id===$service_category_list->first()->id)?'active':''}}"> <i
                            class="{{$list->icon}}"></i>{{$list->name}}</a>
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
</section>
<div class="site-main">
    <section class="cmt-row grid-section clearfix pt-0 service-list">
        <div class="container">
            <!-- row -->
            <div class="row">
                @forelse ($service_list as $key => $service)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <!-- featured-imagebox -->
                    <div class="featured-icon-box icon-align-top-content style4 bor_rad_5">
                        <div class="bg_icon"><i class="{{ $service->icon}}"></i></div>
                        <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center mb-20">
                            <div
                                class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <i class="{{ $service->icon}}"></i>
                            </div>
                            <div
                                class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <h5>
                                    {{ $service->discount_price}} <del>{{ $service->normal_price}}</del>
                                </h5>
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="content-inner">
                                <div class="featured-title">
                                    <h5>{{ $service->name}}</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>{{ $service->description}}</p>
                                </div>
                            </div>
                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-icon-btn-left cmt-btn-color-skincolor"
                                href="{{ route('frontend.category.service.details',[$country->slug,$service->category->slug,$service->slug]) }}"
                                title=""><i class="fa fa-minus"></i>Apply</a>
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
@endsection