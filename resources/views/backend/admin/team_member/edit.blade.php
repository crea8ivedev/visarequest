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
              <h3 class="card-label">Edit Team Member</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ url('admin/team-member/update/'.$data->id) }}">
            @csrf
             
              <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                <div class="col-lg-6">
                  <label>Name <code>*</code></label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"  value="{{ $data->name ?? '' }}" />
                  </div>
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
                    <label>Position <code>*</code></label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="position" name="position" placeholder="Position"  value="{{ $data->position ?? '' }}" />
                    </div>
                    @if ($errors->has('position'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('position') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
              </div>

               

               <div class="form-group row  {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-lg-6">
                   <label>Email</label>
                   <div class="input-group">
                     <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $data->email ?? '' }}" />
                   </div>
                   @if ($errors->has('email'))
                       <span class="help-block">
                           <strong style="color: red">{{ $errors->first('email') }}</strong>
                       </span>
                   @endif
                </div>

                <div class="col-lg-6">
                   <label>Phone Number</label>
                   <div class="input-group">
                     <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number" value="{{ $data->phone ?? '' }}" />
                   </div>
                   @if ($errors->has('phone'))
                       <span class="help-block">
                           <strong style="color: red">{{ $errors->first('phone') }}</strong>
                       </span>
                   @endif
                </div>
               </div>


               <div class="form-group row  {{ $errors->has('facebook') ? ' has-error' : '' }}">
                <div class="col-lg-6">
                   <label>Facebook</label>
                   <div class="input-group">
                     <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="{{ $data->facebook ?? '' }}"/>
                   </div>
                   @if ($errors->has('facebook'))
                       <span class="help-block">
                           <strong style="color: red">{{ $errors->first('facebook') }}</strong>
                       </span>
                   @endif
                </div>

                <div class="col-lg-6">
                   <label>Instagram</label>
                   <div class="input-group">
                     <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="{{ $data->instagram ?? '' }}"/>
                   </div>
                   @if ($errors->has('instagram'))
                       <span class="help-block">
                           <strong style="color: red">{{ $errors->first('instagram') }}</strong>
                       </span>
                   @endif
                </div>
               </div>

               <div class="form-group row  {{ $errors->has('twitter') ? ' has-error' : '' }}">
                <div class="col-lg-6">
                   <label>Twitter</label>
                   <div class="input-group">
                     <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter"  value="{{ $data->twitter ?? '' }}" />
                   </div>
                   @if ($errors->has('twitter'))
                       <span class="help-block">
                           <strong style="color: red">{{ $errors->first('twitter') }}</strong>
                       </span>
                   @endif
                </div>

               </div>
           
            
            <div class="card-footer">
              <input type="hidden" name="action" id="action" value="Add" />
              <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id ?? '' }}" />
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a href="{{ route('admin.team-member')  }}"  type="button" class="btn btn-secondary cancel">Cancel</a>
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

{!! JsValidator::formRequest('App\Http\Requests\Backend\TeamMemberRequest') !!}


@endsection
