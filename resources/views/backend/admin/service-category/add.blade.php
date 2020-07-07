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
        <h3 class="card-label">Add Category</h3>
      </div>

    </div>

    <div class="card-body" id="card-collapse">
      <!--begin::Form-->
      <form class="form" method="post" id="sample_form" action="{{ route('admin.category.service.store')  }}">
        @csrf

        <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
          <label>Category Name <code>*</code>:</label>
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
        <div class="card-footer">
          <input type="hidden" name="action" id="action" value="Add" />
          <input type="hidden" name="hidden_id" id="hidden_id" />
          <button type="submit" class="btn btn-primary mr-2">Add</button>
          <a href="{{ route('admin.category.service')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
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
{!! JsValidator::formRequest('App\Http\Requests\Backend\ServiceCategoryRequest') !!}
@endsection