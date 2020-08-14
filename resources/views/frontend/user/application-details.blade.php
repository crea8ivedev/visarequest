@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title"> {{$applications->service->name}}
                        </h2>
                        <input type="hidden" id="application" name="application" value="{{$applications->id}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class=" category-row">
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-lg-3">
                @include('frontend.layouts.user_side_menu')
            </div>
            <div class="col-lg-9">
                <table class="table">

                    <tbody>

                        <tr>
                            <td>Country : India</td>
                            <td>Description : {{$applications->service->description}}</td>
                        </tr>
                        <tr>
                            <td>Amount : {{$applications->amount}}</td>
                            <td>Applicatio Date :
                                {{date("d/m/Y h:i:s",strtotime($applications->application_applied_date))}}
                            </td>
                        </tr>
                        <tr>
                            <td>Status : {{$applications->status}}</td>
                            <td>Processor Details : {{$applications->service->staff->first_name}}
                                {{$applications->service->staff->last_name}}
                                <a href="tel:{{$applications->service->staff->phone}}"><i
                                        class="fa fa-phone"></i>{{$applications->service->staff->phone}}</a>
                                <a href="mailto:{{$applications->service->staff->phone}}"><i
                                        class="fa fa-envelope"></i>{{$applications->service->staff->email}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> <a href="#"><i class="fa fa-download"></i>Download</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <table class="table  " id="message_table">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">By</th>
                                <th scope="col">Attechment</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
<div class="modal fade applicationModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content html_render">


        </div>
    </div>
</div>
@section('scripts')
@foreach(config('layout.resources.datatable_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
<script src="{{ asset('js/applicationmessages.js') }}" type="text/javascript"></script>
@endsection