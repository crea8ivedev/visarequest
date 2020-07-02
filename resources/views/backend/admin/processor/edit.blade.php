{{-- Extends layout --}}
@extends('backend.layout.default')

{{-- Styles Section --}}
@section('styles')
    
@endsection

{{-- Content --}}
@section('content')

<div class="col-md-12">
    <!--begin::Card-->
    <div class="card card-custom card-collapse"   data-card="true" id="kt_card_4">
        <div class="card-header">
          <div class="card-title">
              <h3 class="card-label">Edit Processor</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ route('admin.processor.update')  }}">
            @csrf
             
              <div class="form-group {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
                <label>First Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name"  value="{{ $data->first_name ?? ''}}" />
                </div>
                @if ($errors->has('first_name'))
                <span id="first_name-error" class="invalid-feedback">{{ $errors->first('first_name') }}</span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label>Last Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="last_name" name="last_name"  placeholder="Last name" value="{{ $data->last_name ?? ''}}" />
                </div>
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email</label>
                <div class="input-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $data->email ?? ''}}" />
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

            <div class="card-footer">
              <input type="hidden" name="action" id="action" value="Add" />
              <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id ?? ''}}" />
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a href="{{ route('admin.processor')  }}"  type="button" class="btn btn-secondary cancel">Cancel</a>
            </div>
          </form>
          <!--end::Form-->
        </div>
    </div>
    <!--end::Card-->
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')

<!-- Laravel Javascript Validation -->
  @foreach(config('layout.resources.validate_js') as $script)
      <script src="{{ asset($script) }}" type="text/javascript"></script>
  @endforeach


{!! JsValidator::formRequest('App\Http\Requests\Backend\ProcessorRequest') !!}

@endsection
