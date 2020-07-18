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
            <span class="card-icon"><i class="fas fa-tag text-primary"></i></span>
              <h3 class="card-label">About US</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ route('admin.about-us.store')  }}">
            @csrf
             
              <div class="form-group">
                <label>Heading :<code>*</code></label>
                <div class="input-group">
                <input type="text" class="form-control" name="heading" id="heading" placeholder="Heading" value="{{ $data->heading ?? '' }}" autocomplete="off" />
                </div>
              </div>

              <div class="form-group">
                <label>Description :<code>*</code></label>
                  <textarea placeholder="Description" class="form-control form-control-solid kt-ckeditor-1" id="description" name="description" autocomplete="off">{{ $data->description ?? '' }}</textarea>
              </div>

            <div class="card-footer">
                <input type="hidden" name="name" value="about us" />
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
    CKEDITOR.instances.description.on('change', function() {    
    for (instance in CKEDITOR.instances) {
          CKEDITOR.instances['description'].updateElement();
      }
      if(CKEDITOR.instances.description.getData().length >  0) {
        $('#description-error').hide();
      } else {
        $('#description-error').show();
      }
   });
</script>

{!! JsValidator::formRequest('App\Http\Requests\Backend\AboutUsRequest') !!}

 

@endsection
