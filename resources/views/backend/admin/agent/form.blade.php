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
             
              <div class="form-group">
                <label>First Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name"  value="" />
                </div>
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" />
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                </div>
              </div>
              <div class="form-group password_hide_show">
                <label>Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                </div>
              </div>

              <div class="form-group password_hide_show" >
                <label>Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Comfirm password" />
                </div>
              </div>


            <div class="card-footer">
              <input type="hidden" name="action" id="action" value="Add" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button type="reset" class="btn btn-secondary cancel">Cancel</button>
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
