@extends('frontend.layouts.app')
@section('content')
<section class="fullwidth-section">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-9">
                    <h4>Do I need a visa?</h4>
                    <p>South African passport holders need a visa to visit Belarus</p>
                    <h4>How Does It Work?</h4>
                    <p>Applications are prepared and lodged with the embassy. VisaRequest can receive documents and
                        assist with submission for applicants throughout South Africa. applicants do not have to be
                        present on submission</p>
                </div>
                <div class="col-lg-3">
                    <div class="select-country">
                        <img src={{ route('display.image',[config("constants.COUNTRY_IMAGE_STORE"),$country->flag]) }}"
                            alt="{{ $country->name }}">
                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<!-- Category End -->
<!--site-main start-->
<div class="site-main">

    <div class="cmt-row sidebar cmt-sidebar-left cmt-bgcolor-white clearfix service-list">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div
                    class="col-lg-4 ttm-col-bgcolor-yes cmt-bg cmt-left-span cmt-bgcolor-grey mt_80 pt-60 mb_80 pb-60 res-991-mt-0 res-991-pt-0 widget-area sidebar-left">
                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                    <aside class="widget widget-nav-menu">
                        <ul class="widget-menu">
                            @forelse ($service_list as $key => $service)
                            <li class="{{($key===0)?'active':''}} service-category" data-serviceid={{$service->id}}
                                data-id={{$service->id}}><a href="javascript:void(0);">{{ $service->name}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-8 content-area service-details">
                    <div class="cmt-service-single-content-area">
                        <div class="featured-icon d-flex flex-wrap justify-content-between align-items-center">
                            <div
                                class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <h5>{{ $service_list->first()->name}}</h5>

                            </div>
                            <div
                                class="cmt-text cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                <h5>
                                    {{ $service_list->first()->discount_price}}
                                    <del>{{$service_list->first()->normal_price}}</del>
                                </h5>
                            </div>
                        </div>
                        <hr />
                        <div class="cmt-service-description">
                            <p>{{$service_list->first()->description}}</p>
                            <div class="btn-group mt-30">
                                @if (Auth::check())
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 "
                                    href="javascript:void(0);">Apply</a>
                                @else
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark mr-30 btn-login"
                                    href="javascript:void(0);">Apply</a>
                                @endif
                                <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark m-0"
                                    href="javascript:void(0);">Contact Agent</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
@include('frontend.common.auth-modal')
@section('scripts')
<script type="text/javascript" src="{{ asset('js/service.js') }}"></script>
<script src="{{ asset('js/auth.js') }}" type="text/javascript"></script>
{!! JsValidator::formRequest('App\Http\Requests\Frontend\AuthRequest','#loginForm') !!}
{!! JsValidator::formRequest('App\Http\Requests\Frontend\SignupRequest','#signupForm') !!}
{!! JsValidator::formRequest('App\Http\Requests\Frontend\ContactRequest') !!}
<script type="text/javascript">
    var country = {!! json_encode($country->slug) !!};
    $('body').on('change','.country',function() {
            var country = $('#select_country').val();
            if(country != '') {
            var url = '{{ route("frontend.service.country", ":country") }}';
            url     = url.replace(':country', country);
            window.location.href = url;
            }
        });
</script>
@endsection