@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title">Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="category-row pt-0 pb-0">
    <div class="container ">
        <div class="row row-eq-height">
            <div class="col-lg-3">
                @include('frontend.layouts.user_side_menu')
            </div>
            <div class="col-lg-9">
                <div class="pt-10">
                    @include('frontend.common.flashMessage')
                </div>
                <form id="profile_form" class="contact_form wrap-form clearfix pt-60 pb-60" method="post"
                    action="{{ route('frontend.user.profile.update')  }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <span class="form-group text-input">
                                <label>First Name <code>*</code></label>
                                <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}" />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="form-group text-input">
                                <label>Last Name <code>*</code></label>
                                <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}" />
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="form-group text-input">
                                <label>Email <code>*</code></label>
                                <input type="email" id="email" name="email" value="{{$user->email}}" />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="form-group text-input">
                                <label>Phone</label>
                                <input type="text" id="phone" name="phone" value="{{$user->phone}}" />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="form-group text-input">
                                <label>Password</label>
                                <input type="password" id="password" name="password" />
                            </span>
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" id="id" name="id" value="{{$user->id}}" />
                            <input
                                class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark cmt-color"
                                type="submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
@foreach(config('layout.resources.validate_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
{!! JsValidator::formRequest('App\Http\Requests\Frontend\ProfileRequest','#profile_form') !!}
@endsection