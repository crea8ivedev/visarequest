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
            <thead>
                <tr>
                    <th>
                        <select>
                            <option value="all">All</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                        </select>
                    </th>
                    <th>
                        Start Date<input type="date" />
                        End Date<input type="date" />
                        <input class="btn btn-info" type="button" value="Search" />
                    </th>


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
</section>
@include('frontend.layouts.footer')
@endsection()
@section('scripts')
@endsection