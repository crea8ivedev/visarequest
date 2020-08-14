@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title">My Services</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="category-row">
    @include('frontend.common.flashMessage')
    <div class="container">
        <div class="row row-eq-height">

            <div class="col-lg-4">

                @include('frontend.layouts.user_side_menu')
            </div>
            <div class="col-lg-8">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="contact_form wrap-form clearfix">
                                <span class="form-group text-input cmt-arrow mb-0 mt-25">
                                    <select>
                                        <option value="all">All</option>
                                        <option value="processing">Processing</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </span>
                            </td>
                            <td class="contact_form wrap-form clearfix">
                                <span class="form-group text-input">
                                    <label>Start Date</label>
                                    <input type="date" id="start_date" name="password" />
                                </span>
                            </td>
                            <td class="contact_form wrap-form clearfix">
                                <span class="form-group text-input">
                                    <label>End Date</label>
                                    <input type="date" id="end_date" name="password" />
                                </span>
                            </td>
                            <td class="contact_form wrap-form clearfix">
                                <input
                                    class="cmt-btn cmt-btn-size-md cmt-btn-shape-round cmt-btn-style-border cmt-btn-color-dark cmt-color pt-17 pb-17 mt-25"
                                    type="button" value="Search" />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <th scope="row">{{$service->service->name}}</th>
                            <td>{{$service->amount}}</td>
                            <td>{{$service->application_applied_date}}</td>
                            <td>{{$service->status}}</td>
                            <td><a class="btn btn-info"
                                    href="{{route('frontend.user.application.service.details',[$service->id])}}"><i
                                        class="fa fa-info-circle"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
@endsection