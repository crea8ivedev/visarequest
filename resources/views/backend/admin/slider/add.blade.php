@extends('backend.layout.default')
{{-- Styles Section --}}
@section('styles')

{{-- custom css--}}
@foreach(config('layout.resources.custom_css') as $style)
<link href="{{  asset($style) }}" rel="stylesheet" type="text/css" />
@endforeach

<style>
  .image-input .image-input-wrapper {
    width: 400px !important;
    height: 200px !important;

  }
</style>

@endsection
@section('content')
<div class="col-md-12">
  <!--begin::Card-->
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Add Slider</h3>
      </div>

    </div>

    <div class="card-body" id="card-collapse">
      <!--begin::Form-->
      <form class="form" method="post" id="sample_form" enctype="multipart/form-data"
        action="{{ route('admin.slider.store')  }}">
        @csrf


        <div class="form-group row {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
          <div class="col-lg-12">
            <label>Name :</label>
            <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Name"
              value="" />
            @if ($errors->has('name'))
            <span id="first_name-error" class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group row {{ $errors->has('text') ? 'is-invalid' : '' }}">
          <div class="col-lg-12">
            <label>Text :</label>
            <textarea class="form-control" id="text" name="text"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="">Image :<code>*</code></label>
          <div class="col-lg-12">
            <div class="image-input image-input-outline" id="kt_image_1">
              <input type="file" class="images-load" id="image" name="image" accept="image/*" />
            </div>
            <span class="form-text text-muted">Allowed file types: jpg, png, jpeg,gif.</span>
          </div>
        </div>
        <div class="row">
          <div class="image form-group col-lg-6">
          </div>
        </div>
        <div class="card-footer">
          <input type="hidden" name="action" id="action" value="Add" />
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button type="submit" class="btn btn-primary mr-2">Add</button>
          <a href="{{ route('admin.slider')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@foreach(config('layout.resources.validate_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
@foreach(config('layout.resources.image_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
{!! JsValidator::formRequest('App\Http\Requests\Backend\SliderRequest') !!}
<script src="{{ asset('js/common.js') }}"></script>
@foreach(config('layout.resources.common_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
@endsection