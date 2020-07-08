@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Services</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="index.html">Home</a>
                        </span>
                        <span>Services</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="site-header-menu" class="site-header-menu cmt-bgcolor-white">
    <div class="site-header-menu-inner cmt-stickable-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-navigation d-flex flex-row align-items-center">
                        <nav class="main-menu menu-mobile m-auto" id="menu">
                            <ul class="menu">
                                @foreach($service_category_list as $list)
                                <li data-id="{{$list->id}}" class="mega-menu-item service-category">
                                    <a href="#" class="mega-menu-link  {{($list->slug===$category->slug)?'active':''}}"> <i class="{{$list->icon}}" aria-hidden="true"></i>{{$list->name}}</a>
                                </li>
                                @endforeach
                                <li>
                                    <select class="form-control country">
                                        <option value="1">Select Country</option>
                                        @foreach($country_list as $list)
                                        <option value="{{$list->id}}" {{ $list->id ==$country ? 'selected="selected"' : '' }}>{{$list->name}}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-main">
    <section class="cmt-row grid-section clearfix service-list">
        <div class="container">
            <div class="row">
                @forelse ($service_list as $service)

                <a href="{{route('frontend.service.details',$service->slug)}}">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="featured-icon-box icon-align-top-content style4 bor_rad_5">
                            <div class="bg_icon"><i class="flaticon-passport-3"></i></div>
                            <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center">
                                <div class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                    <i class="{{ $service->icon }}flaticon-passport-3"></i>
                                </div>
                                <div class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
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
                                <a class="cmt-btn btn-inline cmt-btn-size-md cmt-icon-btn-left cmt-btn-color-skincolor" href="services-details.html" title="">Apply</a>
                                <a class="cmt-btn btn-inline cmt-btn-size-md cmt-icon-btn-left cmt-btn-color-skincolor" href="services-details.html" title="">Contact Agent</a>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <p>No service found for {{$category->name}}.</p>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection()