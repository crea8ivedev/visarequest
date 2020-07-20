@extends('backend.layout.default')
{{-- Styles Section --}}
@section('styles')


@endsection
@section('content')
<div class="col-md-12">
  <!--begin::Card-->
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Add News</h3>
      </div>

    </div>

    <div class="card-body" id="card-collapse">
      <!--begin::Form-->
      <form class="form" method="post" id="sample_form" action="{{ route('admin.news.store')  }}">
        @csrf
        <div class="form-group row">
        <div class="col-lg-6">
          <label>Country :<code>*</code></label>
          <select class="form-control" id="country_id" name="country_id">
            <option value="">Select country</option>
            @foreach($country_list as $country)
            <option value="{{$country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('country_id'))
          <span class="invalid-feedback">{{ $errors->first('country_id') }}</span>
          @endif
        </div>

        <div class="col-lg-6">
          <label>Heading :<code>*</code></label>
          <input class="form-control" id="heading" name="heading" placeholder="Heading" value="{{Request::old('heading') ?? ''}}">
          @if ($errors->has('heading'))
          <span class="invalid-feedback">{{ $errors->first('heading') }}</span>
          @endif
        </div>


        </div>

        
        <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
          <label>Message :<code>*</code></label>
            <textarea class="form-control" id="message" name="message" placeholder="Message">{{Request::old('message') ?? ''}}</textarea>
          @if ($errors->has('message'))
          <span class="help-block">
              <strong style="color: red">{{ $errors->first('message') }}</strong>
          </span>
      @endif
        </div>

        <div class="card-footer">
          <input type="hidden" name="action" id="action" value="Add" />
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button type="submit" class="btn btn-primary mr-2">Add</button>
          <a href="{{ route('admin.news')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
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
   CKEDITOR.replace('message');
   CKEDITOR.instances.message.on('change', function() {    
    for (instance in CKEDITOR.instances) {
          CKEDITOR.instances['message'].updateElement();
      }
      if(CKEDITOR.instances.message.getData().length >  0) {
        $('#message-error').hide();
      } else {
        $('#message-error').show();
      }
  });
</script>

{!! JsValidator::formRequest('App\Http\Requests\Backend\NewsRequest') !!}
@endsection