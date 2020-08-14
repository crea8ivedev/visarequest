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
@include('frontend.layouts.user_side_menu')
<section class="category-row">
    <div class="container">
        @include('frontend.common.flashMessage')
        <form class="" id="profile_form" method="post" action="{{ route('frontend.user.profile.update')  }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label>First Name <code>*</code></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{$user->first_name}}" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label>Last Name <code>*</code></label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{$user->last_name}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label>Email <code>*</code></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                </div>

            </div>
    </div>
    <div class="row">
        <input type="hidden" id="id" name="id" value="{{$user->id}}" />
        <input class="btn btn-info" type="submit" />
    </div>
    </form>
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