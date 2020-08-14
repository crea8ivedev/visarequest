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
                    <a class="btn btn-info open-applicationModal"><i class="fa fa-envelope"></i></a>
                    <div>
                        <select class="form-control">
                            @foreach ($applications as $item)
                            <option value="">All</option>
                            <option value="{{ $item->service->id}}">{{ $item->service->name}}</option>

                            @endforeach
                        </select>
                    </div>
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
    </div>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection()
<div class="modal fade applicationModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content html_render">
            <form id="application_reply_form" action="#" name="application_reply_form" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-control">
                        @foreach ($applications as $item)
                        <option value="">All</option>
                        <option value="{{ $item->service->id}}">{{ $item->service->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" />
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea rows="5" name="message" id="forward" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="file" name="file" />
                </div>
                <input type="button" class="bt btn-info" value="Send" />
            </form>
        </div>
    </div>
</div>
@section('scripts')
@foreach(config('layout.resources.datatable_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
<script src="{{ asset('js/messages.js') }}" type="text/javascript"></script>
@endsection