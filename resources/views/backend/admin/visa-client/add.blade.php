@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Add Visa Client</h3>
      </div>
    </div>
    <div class="card-body" id="card-collapse">
      <form class="form" method="post" id="sample_form" enctype="multipart/form-data" action="{{ route('admin.visa-client.store')  }}">
        @csrf

        <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
          <label>Title :<code>*</code></label>
          <div class="input-group">
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" />
          </div>
          @if ($errors->has('title'))
          <span id="title-error" class="invalid-feedback">{{ $errors->first('title') }}</span>
          @endif
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label>Logo :<code>*</code></label>
            <input type="file" class="images-load" id="file" name="file"  accept="image/*" />
            <span class="form-text text-muted">Allowed file types: jpg, png, jpeg.</span>
          </div>
          <div class="file form-group col-lg-6">
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
{!! JsValidator::formRequest('App\Http\Requests\Backend\VisaClientRequest') !!}
@endsection