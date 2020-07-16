@extends('backend.layout.default')
{{-- Styles Section --}}
@section('styles')
   

@endsection
@section('content')
<div class="col-md-12">
    <!--begin::Card-->
    <div class="card card-custom card-collapse"   data-card="true" id="kt_card_4">
        <div class="card-header">
          <div class="card-title">
            <span class="card-icon"><i class="fas fa-map text-primary"></i></span>
              <h3 class="card-label">Contact US</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ route('admin.contact-us.store')  }}">
            @csrf
             
              <div class="form-group">
                <label>Address :<code>*</code></label>
                  <textarea rows="5" placeholder="Address" class="form-control form-control-solid kt-ckeditor-1" id="address" name="address" autocomplete="off">{{ $data->address ?? '' }}</textarea>
              </div>

              <div class="form-group">
                <label>Address1 : </label>
                  <textarea rows="5" placeholder="Address1" class="form-control form-control-solid kt-ckeditor-1" id="address1" name="address1" autocomplete="off">{{ $data->address1 ?? '' }}</textarea>
              </div>

               <div class="form-group">
                <label>Email : </label>
                  <textarea placeholder="Email" class="form-control form-control-solid kt-ckeditor-1" id="email" name="email" autocomplete="off">{{ $data->email ?? '' }}</textarea>
              </div>

              <div class="form-group">
                <label>Cell Phone : </label>
                  <textarea placeholder="Cell Phone" class="form-control form-control-solid kt-ckeditor-1" id="cell_phone" name="cell_phone" autocomplete="off">{{ $data->cell_phone ?? '' }}</textarea>
              </div>

              <div class="form-group">
                <label>Telephone : </label>
                  <textarea placeholder="Telephone" class="form-control form-control-solid kt-ckeditor-1" id="telephone" name="telephone" autocomplete="off">{{ $data->telephone ?? '' }}</textarea>
              </div>

                <div class="form-group">
                <label>International Calls : </label>
                  <textarea placeholder="International Calls" class="form-control form-control-solid kt-ckeditor-1" id="international_call" name="international_call" autocomplete="off">{{ $data->international_call ?? '' }}</textarea>
              </div>

            <div class="card-footer">
                <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id ?? ''}}" />
              <button type="submit" class="btn btn-primary mr-2">{{ $data ? 'Update' : 'Add'}}</button>
              <a href="{{ route('admin.dashboard')  }}"  type="button" class="btn btn-secondary cancel">Cancel</a>
            </div>
          </form>
          <!--end::Form-->
        </div>
    </div>
    <!--end::Card-->
</div>

@endsection
@section('scripts')

@foreach(config('layout.resources.ckeditor_js') as $script)
 <script src="{{ asset($script) }}" type="text/javascript"></script>
 @endforeach

  @foreach(config('layout.resources.validate_js') as $script)
      <script src="{{ asset($script) }}" type="text/javascript"></script>
  @endforeach

  <script>
   CKEDITOR.replace('description');
</script>

{!! JsValidator::formRequest('App\Http\Requests\Backend\ContactUsRequest') !!}

 

@endsection
