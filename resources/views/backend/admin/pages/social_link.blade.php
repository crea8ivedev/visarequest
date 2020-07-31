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
            <span class="card-icon"><i class="fa fa-link text-primary"></i></span>
              <h3 class="card-label">Social Link</h3>
          </div>
          
        </div>
        
        <div class="card-body" id="card-collapse"  >
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form" action="{{ route('admin.social-link.store')  }}">
            @csrf
             
              <div class="form-group">
                <label>Facebook :</label>
                <div class="input-group">
                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="{{ $data->facebook ?? '' }}" autocomplete="off" />
                </div>
              </div>

              <div class="form-group">
                <label>Twitter :</label>
                <div class="input-group">
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="{{ $data->twitter ?? '' }}" autocomplete="off" />
                </div>
              </div>

              <div class="form-group">
                <label>Google :</label>
                <div class="input-group">
                <input type="text" class="form-control" name="google" id="google" placeholder="Google" value="{{ $data->google ?? '' }}" autocomplete="off" />
                </div>
              </div>

              <div class="form-group">
                <label>Linkedin :</label>
                <div class="input-group">
                <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Linkedin" value="{{ $data->linkedin ?? '' }}" autocomplete="off" />
                </div>
              </div>

              <div class="form-group">
                <label>Instagram :</label>
                <div class="input-group">
                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="{{ $data->instagram ?? '' }}" autocomplete="off" />
                </div>
              </div>

              

            <div class="card-footer">
                <input type="hidden" name="name" value="about us" />
                <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id ?? ''}}" />
              <button type="submit" class="btn btn-primary mr-2">{{ $data ? 'Update' : 'Add'}}</button>
              <a href="{{ route('admin.dashboard')  }}"  type="button" class="btn btn-secondary cancel">Cancel</a>
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

{!! JsValidator::formRequest('App\Http\Requests\Backend\SocialLinkRequest') !!}

 

@endsection
