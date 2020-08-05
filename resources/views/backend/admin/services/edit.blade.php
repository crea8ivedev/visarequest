@extends('backend.layout.default')
@section('styles')

<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

@endsection
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
        <div class="row">

          <div class="form-group col-lg-6">
            <label>Service Name :<code>*</code></label>
            <input class="form-control" id="name" name="name" value="{{ $data->name ?? ''}}" placeholder="Service Name">
            @if ($errors->has('name'))
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="form-group col-lg-6">
            <label>Code :<code>*</code></label>
            <input class="form-control" id="code" name="code" value="{{ $data->code ?? ''}}" placeholder="Code">
            @if ($errors->has('code'))
            <span class="invalid-feedback">{{ $errors->first('code') }}</span>
            @endif
          </div>

        </div>

        <div class="form-group row">
          <div class="col-lg-6">
            <label>Category :<code>*</code></label>
            <select class="form-control  country_id" id="category_id" name="category_id">
              <option value="">Select Category</option>
              @foreach($category_list as $category)
              <option value="{{ $category->id }}"
                {{ $category->id ==$data->category_id  ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('category_id'))
            <span class="invalid-feedback">{{ $errors->first('category_id') }}</span>
            @endif
          </div>

          <div class="col-lg-6">
            <label>Processor :<code>*</code></label>
            <select class="form-control" id="processor_id" name="processor_id">
              <option value="">Select Processor</option>
              @foreach($staff_list as $staff)
              <option value="{{ $staff->id }}" {{ $staff->id ==$data->processor_id  ? 'selected="selected"' : '' }}>
                {{ $staff->FullName }}</option>
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
            <label>Agent :</label>
            <select class="form-control" id="agent_id" name="agent_id">
              <option value="">Select Agent</option>
              @foreach($agent_list as $agent)
              <option value="{{ $agent->id }}" {{ $agent->id ==$data->agent_id  ? 'selected="selected"' : '' }}>
                {{ $agent->FullName }}</option>
              @endforeach
            </select>
            @if ($errors->has('agent_id'))
            <span class="invalid-feedback">{{ $errors->first('agent_id') }}</span>
            @endif
          </div>
          <div class="col-lg-6">
            <label>Normal Price :<code>*</code></label>
            <input class="form-control" id="normal_price" name="normal_price" value="{{ $data->normal_price ?? ''}}"
              placeholder="Normal price">
            @if ($errors->has('normal_price'))
            <span class="invalid-feedback">{{ $errors->first('normal_price') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Discount Price :<code>*</code></label>
            <input class="form-control" id="discount_price" name="discount_price"
              value="{{ $data->discount_price ?? ''}}" placeholder="Discount price">
            @if ($errors->has('discount_price'))
            <span class="invalid-feedback">{{ $errors->first('discount_price') }}</span>
            @endif
          </div>
          <div class="col-lg-6">
            <label>Commission :<code>*</code></label>
            <input class="form-control" id="commission" name="commission" value="{{ $data->commission ?? ''}}"
              placeholder="Commission">
            @if ($errors->has('commission'))
            <span class="help-block">
              <strong style="color: red">{{ $errors->first('commission') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
            <label>Description :<code>*</code></label>
            <textarea class="form-control" id="description" name="description"
              placeholder="Description">{{ $data->description ?? ''}}</textarea>
            @if ($errors->has('discount_price'))
            <span class="invalid-feedback">{{ $errors->first('discount_price') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
            <label>Instruction :</label>
            <textarea class="form-control" id="instruction" name="instruction"
              placeholder="Instruction">{{ $data->instruction ?? ''}}</textarea>
            @if ($errors->has('instruction'))
            <span class="invalid-feedback">{{ $errors->first('instruction') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
            <label>Staff Instruction :</label>
            <textarea class="form-control" id="staffInstruction" name="staffInstruction"
              placeholder="Staff Instruction">{{ $data->staffInstruction ?? ''}}</textarea>
            @if ($errors->has('discount_price'))
            <span class="invalid-feedback">{{ $errors->first('staffInstruction') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group ">
          <label>Country :<code>*</code></label>
          <select class="form-control  country_id select2" id="country_id" name="country_id[]" multiple="multiple">
            <option value="">Select Country</option>
            @foreach($country_list as $country)
            @if(in_array($country->id, $selected_country))
            <option value="{{ $country->id }}" selected="true">{{ $country->name }}</option>
            @else
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endif
            @endforeach
          </select>
          @if ($errors->has('country_id'))
          <span class="invalid-feedback">{{ $errors->first('country_id') }}</span>
          @endif
        </div>
        <div class="form-group row">
          <label>Category icon : <code>*</code></label>
          <div class="input-group">
            <select class="form-control icon-select2" id="icon" name="icon">
              <option value="">Select icon</option>
              @foreach($icons as $icon)
              <option value="fa {{ $icon->icon }}" @if( $data->icon=== 'fa '.$icon->icon ) selected
                @endif>{{ $icon->icon }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-6">
            <label>Status :</label>
            <div class="radio">
              <label class="radio" id="active">
                <input type="radio" name="status" id="active" class="form-control status" value="ACTIVE"
                  {{ $data->status == 'ACTIVE'  ? 'checked' : '' }} /> Active
                <span></span>
              </label>
              <label class="radio" id="deactive">
                <input type="radio" name="status" id="deactive" class="form-control status" value="DEACTIVE"
                  {{ $data->status == 'DEACTIVE'  ? 'checked' : '' }} /> Deactive
                <span></span>
              </label>
            </div>
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
<script>
  $('.select2').select2({container: 'body'})
    $('.select2').on('change', function() {  // when the value changes
    $(this).valid(); // trigger validation on this element
});
function formatState (state) {
  if (!state.id) {
    return state.text;
  }
  var $state = $(
    '<p> <i class="fa '+state.text +'"></i> fa ' + state.text + '</p>'
  );
  return $state;
};

  $(".icon-select2").select2({
  templateResult: formatState
});
</script>
@endsection