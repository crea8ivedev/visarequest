{{-- Extends layout --}}
@extends('backend.layout.default')

{{-- Styles Section --}}
@section('styles')
    
    {{-- datatable css--}}
    @foreach(config('layout.resources.datatable_css') as $style)
        <link href="{{  asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

@endsection

{{-- Content --}}
@section('content')
<div class="row">
  <div class="col-md-12">
      {{-- alert show--}}
      @if(session()->has('message'))
        <div class="alert alert-custom alert-outline-success fade show mb-5" role="alert">
          <div class="alert-icon">
            <i class="flaticon2-check-mark"></i>
          </div>
          <div class="alert-text">{{ session()->get('message') }}</div>
          <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="ki ki-close"></i>
              </span>
            </button>
          </div>
        </div>
      @endif

    <div class="card card-custom">
        <div class="card-header">
          <div class="card-title">
           <span class="card-icon"><i class="flaticon-email text-primary"></i></span>
            <h3 class="card-label">Email Template</h3>
          </div>
          <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{route('admin.email-template.add')}}" class="btn btn-primary font-weight-bolder">
              <i class="la la-plus"></i>
              Add New Email Template
            </a>
           <!--end::Button-->
          </div>
          
        </div>
        <div class="card-body">
          <div class="mb-7">
            <div class="row align-items-center">
              <div class="col-lg-9 col-xl-8">
                <div class="row align-items-center">
                  <div class="col-md-6 my-2 my-md-0">
                    <div class="input-icon">
                      <input type="text" class="form-control search" placeholder="Search by email type, sender email, subject..." id="kt_datatable_search_query">
                      <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <table class="table datatable table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="email_template_table">
                <thead>
                    <tr>
                        <th>Email Type</th>
                        <th>Sender Email</th>
                        <th>Email Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
          </div>
        </div>
    </div>
  </div>

</div>


@endsection

{{-- Scripts Section --}}
@section('scripts')
   

    @foreach(config('layout.resources.datatable_js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    @foreach(config('layout.resources.sweetalert') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach


    <script src="{{ asset('js/pages/email_template.js') }}" type="text/javascript"></script>
     
@endsection