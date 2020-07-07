@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Services Details</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="{{url('home')}}">Home</a>
                        </span>
                        <span>Services</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-main">
    <div class="cmt-row sidebar cmt-sidebar-left cmt-bgcolor-white clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 content-area">
                    <div class="cmt-service-single-content-area">
                        <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center">
                            <div class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <h5>
                                    {{$service->name}}
                                </h5>
                            </div>
                            <div class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <h5>
                                {{$service->discount_price}} <del>{{$service->normal_price}}</del>
                                </h5>
                            </div>
                        </div>
                        <hr />
                        <div class="cmt-service-description">
                            <h4>{{$service->name}}</h4>
                            <p>{{$service->description}}</p>
                            <div class="btn-group mt-30">
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30" href="#">Log In to apply</a>
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark m-0" href="#">Contact Agent</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()