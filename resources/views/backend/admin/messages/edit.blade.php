@extends('backend.layout.default')
{{-- Styles Section --}}
@section('styles')


@endsection
@section('content')
<div class="col-md-12">
  <!--begin::Card-->
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Message Reply</h3>
      </div>

    </div>

    <div class="card-body" id="card-collapse">
      <!--begin::Form-->
      <form class="form" method="post" id="sample_form" action="{{ url('admin/messages/update/'.$data->id) }}">
        @csrf
        <div class="form-group row">
        
        <div class="col-lg-6">
          <label>Email Type :<code>*</code></label>
          <input class="form-control" id="email_type" name="email_type" placeholder="Email type" value="{{ $data->email_type ?? ''}}">
          @if ($errors->has('email_type'))
          <span class="invalid-feedback">{{ $errors->first('email_type') }}</span>
          @endif
        </div>

        <div class="col-lg-6">
            <label>Subject :<code>*</code></label>
            <input class="form-control" id="subject" name="subject" placeholder="Subject" value="{{ $data->subject ?? ''}}">
            @if ($errors->has('subject'))
            <span class="invalid-feedback">{{ $errors->first('subject') }}</span>
            @endif
          </div>
        </div>

        <div class="col-lg-12">
          <label>Message :<code>*</code></label>
         
            <textarea class="form-control" id="message" name="message" placeholder="Message"></textarea>
         
          @if ($errors->has('message'))
          <span class="help-block">
              <strong style="color: red">{{ $errors->first('message') }}</strong>
          </span>
      @endif
        </div>

        <div class="card-footer">
          <input type="hidden" name="action" id="action" value="Add" />
        <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id }}" />
          <button type="submit" class="btn btn-primary mr-2">Send</button>
          <a href="{{ route('admin.messages')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
        </div>
      </form>
      <!--end::Form-->
    </div>
  </div>
  <!--end::Card-->
</div>

@endsection
@section('scripts')

 @foreach(config('layout.resources.ckeditor_js') as $script)
 <script src="{{ asset($script) }}" type="text/javascript"></script>
 @endforeach

@foreach(config('layout.resources.validate_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach

<script>
   CKEDITOR.replace('message');
</script>

{!! JsValidator::formRequest('App\Http\Requests\Backend\MessageRequest') !!}
@endsection