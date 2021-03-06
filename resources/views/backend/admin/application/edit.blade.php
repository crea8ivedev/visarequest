@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Edit Application</h3>
      </div>
    </div>
    <form class="form" method="post" id="sample_form" action="{{ route('admin.service.update',['id'=>$data->id])}}">
      @csrf
      <div class="card-body">
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Staff Name</label>
            <input class="form-control" id="name" name="name" value="{{ $data->name ?? ''}}" placeholder="Service Name">
            @if ($errors->has('name'))
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
          </div>
          
        
       
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Discount Price</label>
            <input class="form-control" id="discount_price" name="discount_price" value="{{ $data->discount_price ?? ''}}" placeholder="Discount price">
            @if ($errors->has('discount_price'))
            <span class="invalid-feedback">{{ $errors->first('discount_price') }}</span>
            @endif
          </div>
          <div class="col-lg-6">
            <label>Commission</label>
            <input class="form-control" id="commission" name="commission" value="{{ $data->commission ?? ''}}" placeholder="Commission">
            @if ($errors->has('commission'))
            <span class="help-block">
              <strong style="color: red">{{ $errors->first('commission') }}</strong>
            </span>
            @endif
          </div>
        </div>
       
        
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-lg-6">
            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <a href="{{route('admin.service')}}" type="button" class="btn btn-secondary">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
@foreach(config('layout.resources.validate_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
@foreach(config('layout.resources.select2_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
{!! JsValidator::formRequest('App\Http\Requests\Backend\ServiceRequest') !!}
@endsection