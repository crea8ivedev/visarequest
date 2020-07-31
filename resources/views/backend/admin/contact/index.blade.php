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
              <span class="card-icon"><i class="far fa-address-card text-primary"></i></span>
            <h3 class="card-label">Contact US</h3>
          </div>
          <div class="card-toolbar">
            
          </div>
        </div>
        <div class="card-body">
          <div class="mb-7">
            <div class="row align-items-center">
              <div class="col-lg-9 col-xl-8">
                <div class="row align-items-center">
                  <div class="col-md-6 my-2 my-md-0">
                    <div class="input-icon">
                      <input type="text" class="form-control search" placeholder="Search by name, email, phone" id="kt_datatable_search_query">
                      <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <table class="table datatable table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="contact_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
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
                <h4 class="modal-titles">Contact Us</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" id="sample_form" class="form-horizontal" action="{{ route('admin.contact.update')  }}">
                <div class="modal-body">
                    @csrf
                    <div class="card-body py-4">
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Name :</label>
                            <div class="col-8">
                                <span id="name" class="form-control-plaintext font-weight-bolder">-</span>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Message :</label>
                            <div class="col-8">
                                <span id="message" class="form-control-plaintext font-weight-bolder">-</span>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Comment :</label>
                            <div class="col-8">
                                    <textarea  rows="5" name="comment" id="comment" class="form-control " ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <button type="submit"  id="submit" name="action_button" id="action_button" class="btn btn-primary ">
                    Send
                    </button>
                </div>
            </form>
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

    @foreach(config('layout.resources.validate_js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    <script src="{{ asset('js/pages/contact.js') }}" type="text/javascript"></script>
     
    {!! JsValidator::formRequest('App\Http\Requests\Backend\ContactRequest') !!}
@endsection