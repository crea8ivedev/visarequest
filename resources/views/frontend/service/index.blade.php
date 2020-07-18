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
                        <img src="{{ asset('/images/country/') }}/{{ $country->flag }}"
                            alt="{{ $country->name }}">
                        <div class="form-group">
                            <select class="form-control country" id="select_country">
                                <option value="1">Select Country</option>
                                @foreach($country_list as $list)
                                <option value="{{strtolower($list->name)}}" {{($list->id===$country->id)?'selected':''}}>{{$list->name}}</option>
                                @endforeach
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('modals')
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModal">PAYMENTS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="error" id="errorMessage"></p>
                <form method="POST" id="paymentForm" action="">
                    @csrf
                    <div class="form-group row">
                        <label for="ccNumber" class="col-md-4 col-form-label text-md-right">Card Number</label>
                        <div class="col-md-6">
                            <input id="ccNumber" type="text" class="form-control" name="ccNumber" autofocus>
                            @error('ccNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cvc" class="col-md-4 col-form-label text-md-right">CVC</label>
                        <div class="col-md-6">
                            <input id="cvc" type="text" class="form-control" name="cvc" autofocus>
                            @error('cvc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cvc" class="col-md-4 col-form-label text-md-right">Expiry Date</label>
                        <div class="col-md-6">
                            <select id="ccExpMonth">
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            @error('cvc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <select id="ccExpYear">
                                <option value="13">2013</option>
                                <option value="14">2014</option>
                                <option value="15">2015</option>
                                <option value="16">2016</option>
                                <option value="17">2017</option>
                                <option value="18">2018</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                                <option value="25">2025</option>
                                <option value="26">2026</option>
                                <option value="27">2027</option>
                                <option value="28">2028</option>
                                <option value="29">2029</option>
                                <option value="30">2030</option>
                            </select>                          
                            @error('cvc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button id="process-payment-btn" type="submit" class="btn btn-primary">
                                Process Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="agentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agent">Contact Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="agentForm" action="">
                    @csrf
                    <p class="error" id="errorMessage"></p>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" autofocus>
                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email"  >
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
                        <div class="col-md-6">
                            <textarea id="message" name="message" ></textarea>
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                  <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/service.js') }}"></script>
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
<script type="text/javascript" src="https://www.simplify.com/commerce/v1/simplify.js"></script>
@endsection
