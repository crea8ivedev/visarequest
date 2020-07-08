@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Add Application</h3>
      </div>
    </div>
    <form class="form" method="post" id="sample_form" action="{{ route('admin.service.store')  }}">
      @csrf
      <div class="card-body">
        <div class="form-group row">
         
          <div class="col-lg-6">
            <label>Service</label>
            <select class="form-control" id="service_id" name="service_id">
              <option value="">Select Service</option>
              @foreach($service_list as $service)
              <option value="{{ $service->id }}">{{ $service->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('service_id'))
            <span class="invalid-feedback">{{ $errors->first('service_id') }}</span>
            @endif
          </div>

          <div class="col-lg-6">
            <label>User</label>
            <select class="form-control" id="user_id" name="user_id">
              <option value="">Select User</option>
              @foreach($user_list as $user)
              <option value="{{ $user->id }}">{{ $user->FullName }}</option>
              @endforeach
            </select>
            @if ($errors->has('service_id'))
            <span class="invalid-feedback">{{ $errors->first('service_id') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          
          <div class="col-lg-6">
            <label>Service Assign</label>
            <select class="form-control" id="assign_id" name="assign_id">
              <option value="">Select Processor</option>
              @foreach($staff_list as $staff)
              <option value="{{ $staff->id }}">{{ $staff->FullName }}</option>
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
            <label>Status:</label>
            <div class="radio">
              <label class="radio" id="active">
                <input type="radio" name="status" id="active" class="form-control status" value="1" checked="" /> Active
                <span></span>
              </label>
              <label class="radio" id="deactive">
                <input type="radio" name="status" id="deactive" class="form-control status" value="0" /> Deactive
                <span></span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-lg-6">
            <button type="submit" class="btn btn-primary mr-2">Add</button>
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