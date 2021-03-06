{{-- Extends layout --}}
@extends('backend.layout.default')

{{-- Styles Section --}}
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">

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
          <form class="form" method="post" id="sample_form" action="{{ url('admin/processor/update/'.$data->id) }}">
            @csrf
             
              
              <div class="form-group row {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
                <div class="col-lg-6">
                  <label>First Name  :<code>*</code></label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" autocomplete="off"  value="{{ $data->first_name ?? ''}}" />
                  </div>
                  @if ($errors->has('first_name'))
                  <span id="first_name-error" class="invalid-feedback">{{ $errors->first('first_name') }}</span>
                  @endif
                </div>

                <div class="col-lg-6">
                    <label>Last Name :</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="last_name" name="last_name"  placeholder="Last name" autocomplete="off" value="{{ $data->last_name ?? ''}}" />
                    </div>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group row  {{ $errors->has('email') ? ' has-error' : '' }}">
                 <div class="col-lg-6">
                    <label>Email :<code>*</code></label>
                    <div class="input-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" value="{{ $data->email ?? ''}}" />
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                 </div>

                 <div class="col-lg-6">
                    <label>Phone Number :<code>*</code></label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number" autocomplete="off"  value="{{ $data->phone ?? ''}}" />
                    </div>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                 </div>
              </div>

               <div class="form-group row  {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-lg-6">
                  <label>Password :</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                  </div>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong style="color: red">{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="col-lg-6 hide password_hide_show">
                    <label>Confirm Password :</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" autocomplete="off" placeholder="Comfirm password" />
                    </div>
                     @if ($errors->has('confirm_password'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('confirm_password') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Status :</label>
                  <div class="radio">
                      <label class="radio" id="active">
                          <input type="radio" name="status" id="active"  class="form-control status" value="ACTIVE" {{ $data->status == 'ACTIVE'  ? 'checked' : '' }} /> Active
                          <span></span>
                      </label>
                      <label class="radio" id="deactive">
                          <input type="radio" name="status" id="active"  class="form-control status" value="DEACTIVE" {{ $data->status == 'DEACTIVE'  ? 'checked' : '' }} /> Active
                          <span></span>
                      </label>
                  </div>
               </div>
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

 @foreach(config('layout.resources.common_js') as $script)
      <script src="{{ asset($script) }}" type="text/javascript"></script>
  @endforeach



@endsection
