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
        <h3 class="card-label">Edit Country</h3>
      </div>

    </div>

    <div class="card-body" id="card-collapse">
      <!--begin::Form-->
      <form class="form"  enctype="multipart/form-data" method="post" id="sample_form" action="{{ route('admin.country.update',['id'=>$data->id])}}">
        @csrf

        <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
          <label>Country Name :<code>*</code></label>
          <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" value="{{ $data->name ?? ''}}"
              placeholder="Country name" />
          </div>
          @if ($errors->has('name'))
          <span id="name-error" class="invalid-feedback">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
          <label>Descriptions :</label>
          <div class="input-group">
            <textarea class="form-control" id="description" name="description"
              placeholder="Description">{{ $data->description ?? ''}}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-lg-6">
            <label>Flag :<code>*</code></label>
            <input type="file" class="images-load" id="countryFlag" name="countryFlag" accept="image/*" />
            <span class="form-text text-muted">Allowed file types: jpg, png, jpeg.</span>
          </div>
          <div class="form-group col-lg-6">
            <label>Tourist Image :<code>*</code></label>
            <input type="file" class="images-load" id="countryTouristImage" name="countryTouristImage"
              accept="image/*" />
            <span class="form-text text-muted">Allowed file types: jpg, png, jpeg.</span>
          </div>
        </div>
        <div class="row">
          <div class="countryFlag form-group col-lg-6">
            <img width="250px" height="150px" src="{{ route('display.image',[config("constants.IMAGES.COUNTRY_IMAGE"),$data->flag]) }}" />
          </div>
          <div class="countryTouristImage form-group col-lg-6">
            @if($data->tourist_image)
            <img width="250px" height="150px" src="{{ route('display.image',[config("constants.IMAGES.COUNTRY_TOURIST_IMAGE"),$data->tourist_image]) }}" />
            @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Need visa?:</label>
            <div class="radio">
              <label class="radio" id="active">
                <input type="radio" name="need_visa" id="active" class="form-control status" value="1"
                  {{ $data->need_visa == 1  ? 'checked' : '' }} /> Yes
                <span></span>
              </label>
              <label class="radio" id="deactive">
                <input type="radio" name="need_visa" id="deactive" class="form-control status" value="0"
                  {{ $data->need_visa == 0  ? 'checked' : '' }} /> No
                <span></span>
              </label>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="hidden" name="action" id="action" value="Add" />
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button type="submit" class="btn btn-primary mr-2">Update</button>
          <a href="{{ route('admin.country')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
        </div>
      </form>
      <!--end::Form-->
    </div>
  </div>
  <!--end::Card-->
</div>

@endsection
@section('scripts')
@foreach(config('layout.resources.validate_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
<script src="{{ asset('js/common.js') }}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Backend\CountryRequest') !!}
@endsection