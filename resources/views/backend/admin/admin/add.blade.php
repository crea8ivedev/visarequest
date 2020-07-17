@extends('backend.layout.default')
{{-- Styles Section --}}
@section('styles')


@endsection
@section('content')
<div class="col-md-12">
    <!--begin::Card-->
    <div class="card card-custom card-collapse"   data-card="true" id="kt_card_4">
        <div class="card-header">
          <div class="card-title">
              <h3 class="card-label">Add Admin</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ route('admin.admin.store')  }}">
            @csrf
              

              <div class="form-group row {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
                <div class="col-lg-6">
                  <label>First Name :<code>*</code></label>
                    <input type="text" class="form-control" name="first_name" id="first_name" autocomplete="off" placeholder="First name"  value="" />
                  @if ($errors->has('first_name'))
                  <span id="first_name-error" class="invalid-feedback">{{ $errors->first('first_name') }}</span>
                  @endif
                </div>
                 <div class="col-lg-6">
                    <label>Last Name :</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" placeholder="Last name" />
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
                      <input type="email" class="form-control" name="email" id="email" autocomplete="off email" placeholder="Email" />
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                 </div>

                 <div class="col-lg-6">
                    <label>Phone Number :<code>*</code></label>
                      <input type="email" class="form-control" name="phone" id="phone" autocomplete="off" placeholder="Phone number" />
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                 </div>
              </div>

              <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-lg-6">
                  <label>Password :<code>*</code></label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password" />
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong style="color: red">{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              
                <div class="col-lg-6">
                    <label>Confirm Password :<code>*</code></label>
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" autocomplete="off" placeholder="Comfirm password" />
                     @if ($errors->has('confirm_password'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('confirm_password') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Status:</label>
                  <div class="radio">
                      <label class="radio" id="active">
                          <input type="radio" name="status" id="active"  class="form-control status" value="ACTIVE" checked="" /> Active
                          <span></span>
                      </label>
                      <label class="radio" id="deactive">
                          <input type="radio" name="status" id="deactive"  class="form-control status" value="DEACTIVE" /> Deactive
                          <span></span>
                      </label>
                  </div>
               </div>
              </div>


            <div class="card-footer">
              <input type="hidden" name="action" id="action" value="Add" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <button type="submit" class="btn btn-primary mr-2">Add</button>
              <a href="{{ route('admin.admin')  }}"  type="button" class="btn btn-secondary cancel">Cancel</a>
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

{!! JsValidator::formRequest('App\Http\Requests\Backend\AdminRequest') !!}

 @foreach(config('layout.resources.common_js') as $script)
      <script src="{{ asset($script) }}" type="text/javascript"></script>
 @endforeach


@endsection
