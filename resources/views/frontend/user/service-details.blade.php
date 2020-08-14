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
@include('frontend.layouts.user_side_menu')
<section class="category-row">
    @include('frontend.common.flashMessage')
    <div class="container">
        <table class="table">

            <tbody>
                <tr>
                    <td>Service : {{$service->service->name}}</td>
                    <td>Category : {{$service->service->category->name}}</td>
                </tr>
                <tr>
                    <td>Country : India</td>
                    <td>Description : {{$service->service->description}}</td>
                </tr>
                <tr>
                    <td>Amount : {{$service->amount}}</td>
                    <td>Applicatio Date : {{date("d/m/Y h:i:s",strtotime($service->application_applied_date))}}</td>
                </tr>
                <tr>
                    <td>Status : {{$service->status}}</td>
                    <td>Processor Details : {{$service->service->staff->first_name}}
                        {{$service->service->staff->last_name}}
                        <a href="tel:{{$service->service->staff->phone}}"><i
                                class="fa fa-phone"></i>{{$service->service->staff->phone}}</a>
                        <a href="mailto:{{$service->service->staff->phone}}"><i
                                class="fa fa-envelope"></i>{{$service->service->staff->email}}</a></td>
                </tr>
                <tr>
                    <td colspan="2"> <a href="#"><i class="fa fa-download"></i>Download</a></td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead>

                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Application</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Messages</th>
                    <th scope="col">Attechment</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($services as $service)
                <tr>
                    <th scope="row">{{$service->service->name}}</th>
                <td>{{$service->amount}}</td>
                <td>{{$service->application_applied_date}}</td>
                <td>{{$service->status}}</td>
                <td><a class="btn btn-info"
                        href="{{route('frontend.user.application.service.details',[$service->id])}}"><i
                            class="fa fa-info-circle"></i></a></td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
@endsection