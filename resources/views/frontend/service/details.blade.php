@extends('frontend.layouts.app')
@section('content')
<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2><strong>{{$country->name}}</strong></h2>
                        <h2 class="title">{{$category->name}}</h2>
                        {{-- <h2>{{$service->name}}</h2> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-title end -->
<!--site-main start-->
<div class="site-main">
    <div class="cmt-row sidebar cmt-sidebar-left cmt-bgcolor-white clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div
                    class="col-lg-4 ttm-col-bgcolor-yes cmt-bg cmt-left-span cmt-bgcolor-grey mt_80 pt-60 mb_80 pb-60 res-991-mt-0 res-991-pt-0 widget-area sidebar-left">
                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                    <aside class="widget widget-nav-menu">
                        <ul class="widget-menu">
                            @forelse ($service_list as $key => $list)
                            <li class="{{($key===0)?'active':''}} service-category" data-id={{$list->id}}><a
                                    href="javascript:void(0);">{{ $list->name}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-8 content-area">
                    <div id='loading' class="text-center mt-80" style="display: none;">
                        <img src='{{ asset('/images/reload.gif') }}' width='25px' height='25px'>
                    </div>
                    <div class="cmt-service-single-content-area service-details">
                        <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center">
                            <div
                                class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <h5>
                                    {{ $service->name}}
                                </h5>
                            </div>
                            <div
                                class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <h5>
                                    R{{ $service->discount_price}} <del>{{ $service->normal_price}}</del>
                                </h5>
                            </div>
                        </div>
                        <hr />
                        <div class="cmt-service-description">
                            {{ $service->description}}
                            <div class="btn-group mt-30">
                                @if (Auth::check())
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 btnPaymentModal"
                                    href="javascript:void(0);">Apply</a>
                                @else
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 btn-login"
                                    href="javascript:void(0);">Apply</a>
                                @endif
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark m-0 btnContactAgent"
                                    href="javascript:void(0);">Contact Agent</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
    </div>

</div>
<!--site-main end-->
@include('frontend.layouts.footer')
@endsection()
@include('frontend.common.payment')
@section('scripts')
<script type="text/javascript" src="{{ asset('js/service-details.js') }}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Frontend\ContactRequest') !!}
<script type="text/javascript" src="https://www.simplify.com/commerce/v1/simplify.js"></script>
@endsection