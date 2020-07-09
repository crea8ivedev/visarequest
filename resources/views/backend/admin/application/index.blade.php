@extends('backend.layout.default')
@section('styles')
@foreach(config('layout.resources.datatable_css') as $style)
<link href="{{  asset($style) }}" rel="stylesheet" type="text/css" />
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
           <span class="card-icon"><i class="fas fa-tasks text-primary"></i></span>
          <h3 class="card-label">Applications</h3>
        </div>
        <div class="card-toolbar">
          <!--begin::Button-->
          {{-- <a href="{{route('admin.service-assign.add')}}" class="btn btn-primary font-weight-bolder">
            <i class="la la-plus"></i>
            Add Service Assign
          </a> --}}
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
                    <input type="text" class="form-control search" placeholder="Search by service name" id="kt_datatable_search_query">
                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                  </div>
                </div>
                {{-- <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                      <label class="mr-5 mb-2 my-md-0 d-none ">Visa Name:</label>
                        <select name="visa_filter" id="visa_filter" id="kt_datatable_search_status" class="form-control visa_filter">
                              <option value="">Select Visa</option>
                               @foreach($visa_list as $visa)
                                <option value="{{ $visa->id }}">{{ $visa->visa_type }}</option>
                @endforeach
                </select>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
    <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
      <table class="table datatable table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="application_table">
        <thead>
          <tr>
            <th>Service Name</th>
            <th>User Name</th>
            {{-- <th>Country</th> --}}
            <th>Staff Name</th>
            <th>Commission</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
</div>

</div>


<div id="formModal" class="modal fade" role="dialog">
<!-- Image loader -->
  <div id='loading' style='display: none;'>
    <img src='{{ asset('/media/loader/reload.gif') }}' width='50px' height='50px'>
  </div>
<!-- Image loader -->
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-titles" id="service_name" >Service basic details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" id="sample_form" class="form-horizontal">
            <div class="modal-body" id="html_render">
                <span id="form_result"></span>
                  @csrf    
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
              <input type="hidden" name="action" id="action" value="Add" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              {{-- <button type="submit"  id="submit" name="action_button" id="action_button" class="btn btn-primary">
                Send
              </button> --}}
            </div>
          </form>

        </div>
    </div>
</div>


@endsection
@section('scripts')
@foreach(config('layout.resources.datatable_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
@foreach(config('layout.resources.sweetalert') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
<script src="{{ asset('js/pages/application.js') }}" type="text/javascript"></script>
@endsection