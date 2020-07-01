@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
    <!--begin::Card-->
    <div class="card card-custom card-collapse"   data-card="true" id="kt_card_4">
        <div class="card-header">
          <div class="card-title">
              <h3 class="card-label">Add Agent</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ route('admin.agent.store')  }}">
            @csrf
             
              <div class="form-group {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
                <label>First Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name"  value="" />
                </div>
                @if ($errors->has('first_name'))
                <span id="first_name-error" class="invalid-feedback">{{ $errors->first('first_name') }}</span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label>Last Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" />
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
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group password_hide_show {{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group password_hide_show {{ $errors->has('confirm_password') ? ' has-error' : '' }}" >
                <label>Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Comfirm password" />
                </div>
                 @if ($errors->has('confirm_password'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('confirm_password') }}</strong>
                    </span>
                @endif
              </div>


            <div class="card-footer">
              <input type="hidden" name="action" id="action" value="Add" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ route('admin.agent')  }}"  type="button" class="btn btn-secondary cancel">Cancel</a>
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

{!! JsValidator::formRequest('App\Http\Requests\Backend\AgentRequest') !!}



@endsection
