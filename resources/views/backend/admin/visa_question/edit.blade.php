@extends('backend.layout.default')
{{-- Styles Section --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">

@endsection
@section('content')
<div class="col-md-12">
  <!--begin::Card-->
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Edit Visa Question  
        <div class="text-muted pt-2 font-size-sm">NOTE: "XX" replace by  country name</div></h3>
      </div>
    </div>

    <div class="card-body" id="card-collapse">
      <!--begin::Form-->
      <form class="form" method="post" id="sample_form" action="{{ route('admin.visa-question.update',['id'=>$data->id])}}">
        @csrf

        <div class="form-group {{ $errors->has('lable') ? 'is-invalid' : '' }}">
          <label>Lable  :<code>*</code></label>
          <div class="input-group">
            <textarea class="form-control" id="lable" name="lable" placeholder="Lable">{{ $data->lable ?? ''}}</textarea>
          </div>
          @if ($errors->has('lable'))
          <span id="lable-error" class="invalid-feedback">{{ $errors->first('lable') }}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
          <label>Value :<code>*</code></label>
          <div class="input-group">
            <textarea class="form-control" id="value" name="value" placeholder="Value">{{ $data->value ?? ''}}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Status :</label>
            <div class="radio">
              <label class="radio" id="active">
                <input type="radio" name="status" id="active" class="form-control status" value="active" {{ $data->status == 'active'  ? 'checked' : '' }} /> Active
                <span></span>
              </label>
              <label class="radio" id="deactive">
                <input type="radio" name="status" id="deactive" class="form-control status" value="deactive" {{ $data->status == 'deactive'  ? 'checked' : '' }} /> Deactive
                <span></span>
              </label>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="hidden" name="action" id="action" value="Add" />
        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id ?? ''}}" />
          <button type="submit" class="btn btn-primary mr-2">Update</button>
          <a href="{{ route('admin.visa-question')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
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

{!! JsValidator::formRequest('App\Http\Requests\Backend\VisaQuestionRequest') !!}
@endsection