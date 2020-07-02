@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Edit Service</h3>
      </div>
    </div>
    <form class="form" method="post" id="sample_form" action="{{ route('admin.service.update',['id'=>$data->id])}}">
      @csrf
      <div class="card-body">
        <div class="form-group row">
          <div class="col-lg-12">
            <label>Service Name</label>
            <input class="form-control" id="name" name="name" value="{{ $data->name ?? ''}}" placeholder="Service Name">
            @if ($errors->has('name'))
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Country</label>
            <select class="form-control  country_id" id="country_id" name="country_id">
              <option value="">Select Country</option>
              @foreach($country_list as $country)
              <option value="{{ $country->id }}" {{ $country->id ==$data->country_id  ? 'selected="selected"' : '' }}>{{ $country->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('country_id'))
            <span class="invalid-feedback">{{ $errors->first('country_id') }}</span>
            @endif
          </div>
          <div class="col-lg-6">
            <label>Processor</label>
            <select class="form-control" id="processor_id" name="processor_id">
              <option value="">Select Processor</option>
              @foreach($staff_list as $staff)
              <option value="{{ $staff->id }}" {{ $staff->id ==$data->processor_id  ? 'selected="selected"' : '' }}>{{ $staff->FullName }}</option>
              @endforeach
            </select>
            @if ($errors->has('processor_id'))
            <span class="help-block">
              <strong style="color: red">{{ $errors->first('processor_id') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Agent</label>
            <select class="form-control" id="agent_id" name="agent_id">
              <option value="">Select Agent</option>
              @foreach($agent_list as $agent)
              <option value="{{ $agent->id }}" {{ $agent->id ==$data->agent_id  ? 'selected="selected"' : '' }}>{{ $staff->FullName }}</option>
              @endforeach
            </select>
            @if ($errors->has('agent_id'))
            <span class="invalid-feedback">{{ $errors->first('agent_id') }}</span>
            @endif
          </div>
          <div class="col-lg-6">
            <label>Normal Price</label>
            <input class="form-control" id="normal_price" name="normal_price" value="{{ $data->normal_price ?? ''}}" placeholder="Normal price">
            @if ($errors->has('normal_price'))
            <span class="invalid-feedback">{{ $errors->first('normal_price') }}</span>
            @endif
          </div>
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
        <div class="form-group row">
          <div class="col-lg-12">
            <label>Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $data->description ?? ''}}</textarea>
            @if ($errors->has('discount_price'))
            <span class="invalid-feedback">{{ $errors->first('discount_price') }}</span>
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