@extends('frontend.layouts.app')
@section('content')
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading innerpagetitle text-center">
                        <h2 class="title">My Application</h2>
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
            <div class="col-lg-3">
                @include('frontend.layouts.user_side_menu')
            </div>
            <div class="col-lg-9">
                <div class="container">
                    <nav class="main-menu menu-mobile m-auto" id="menu">
                        <ul class="menu category-list">
                            <li class="mega-menu-item applicationData filter-li">
                                <a href="javascript:void(0);" data-status='all' class="mega-menu-link  filter-a active">
                                    <i class="fa fa-globe" aria-hidden="true"></i>Total&nbsp;<span
                                        class="badge badge-dark">{{$applications->count()}}</span></a>
                            </li>
                            <li class="mega-menu-item applicationData filter-li">
                                <a href="javascript:void(0);" data-status='processing' class="mega-menu-link  filter-a">
                                    <i class="fa fa-check" aria-hidden="true"></i>Processing&nbsp;<span
                                        class="badge badge-warning">{{$applications->where('status','PROCESSING')->count()}}</span></a>
                            </li>
                            <li class="mega-menu-item applicationData filter-li">
                                <a href="javascript:void(0);" data-status='completed' class="mega-menu-link   filter-a">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>Completed&nbsp;<span
                                        class="badge badge-success">{{$applications->where('status','COMPLETED')->count()}}</span></a>
                            </li>
                            <li class="mega-menu-item applicationData filter-li">
                                <a href="javascript:void(0);" data-status='cancel' class="mega-menu-link  filter-a">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Cancel&nbsp;<span
                                        class="badge badge-danger">{{$applications->where('status','CANCEL')->count()}}</span></a>
                            </li>
                        </ul>
                    </nav>
                    <div>
                        <table class="table  " id="application_table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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
<script src="{{ asset('js/application.js') }}" type="text/javascript"></script>
@endsection