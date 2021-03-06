@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Add Country</h3>
      </div>
    </div>
    <div class="card-body" id="card-collapse">
      <form class="form" method="post" id="sample_form" enctype="multipart/form-data" action="{{ route('admin.country.store')  }}">
        @csrf

        <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
          <label>Country Name :<code>*</code></label>
          <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Country name" />
          </div>
          @if ($errors->has('name'))
          <span id="name-error" class="invalid-feedback">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
          <label>Descriptions :</label>
          <div class="input-group">
            <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-lg-6">
            <label>Flag :<code>*</code></label>
            <input type="file" class="images-load" id="countryFlag" name="countryFlag"  accept="image/*" />
            <span class="form-text text-muted">Allowed file types: jpg, png, jpeg.</span>
          </div>
          <div class="form-group col-lg-6">
            <label>Tourist Image :<code>*</code></label>
            <input type="file" class="images-load" id="countryTouristImage" name="countryTouristImage"  accept="image/*" />
            <span class="form-text text-muted">Allowed file types: jpg, png, jpeg.</span>
          </div>
        </div>
        <div class="row">
          <div class="countryFlag form-group col-lg-6">
          </div>
          <div class="countryTouristImage form-group col-lg-6">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Need visa?:</label>
            <div class="radio">
              <label class="radio" id="active">
                <input type="radio" name="need_visa" id="active" class="form-control status" value="1" checked="" /> Yes
                <span></span>
              </label>
              <label class="radio" id="deactive">
                <input type="radio" name="need_visa" id="deactive" class="form-control status" value="0" /> No
                <span></span>
              </label>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="hidden" name="action" id="action" value="Add" />
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button type="submit" class="btn btn-primary mr-2">Add</button>
          <a href="{{ route('admin.country')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
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
<script src="{{ asset('js/common.js') }}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Backend\CountryRequest') !!}
@endsection