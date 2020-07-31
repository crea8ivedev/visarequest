@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <span class="card-icon"><i class="fas fa-map text-primary"></i></span>
        <h3 class="card-label">Contact US</h3>
      </div>
    </div>
    <div class="card-body" id="card-collapse">
      <form class="form" method="post" id="sample_form" action="{{ route('admin.contact-us.store')  }}">
        @csrf
        <div class="form-group">
          <label>Office :<code>*</code></label>
          <select class="form-control office_name" id="office_name" name="office_name">
            <option value="Pretoria Head Office"> Pretoria Head Office
            </option>
            <option value="Cape Town Regional Office"> Cape Town Regional
              Office</option>
            <option value="Harare International Office"> Harare
              International Office</option>
          </select>
        </div>
        <div class="form-group">
          <label>Address :<code>*</code></label>
          <textarea rows="5" placeholder="Address" class="form-control" id="address" name="address"
            autocomplete="off">{{ $data->address ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label>Email : </label>
          <textarea placeholder="Email" class="form-control " id="email" name="email"
            autocomplete="off">{{ $data->email ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label>Cell Phone : </label>
          <textarea placeholder="Cell Phone" class="form-control " id="cell_phone" name="cell_phone"
            autocomplete="off">{{ $data->cell_phone ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label>Telephone : </label>
          <textarea placeholder="Telephone" class="form-control " id="telephone" name="telephone"
            autocomplete="off">{{ $data->telephone ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label>International Calls : </label>
          <textarea placeholder="International Calls" class="form-control  " id="international_call"
            name="international_call" autocomplete="off">{{ $data->international_call ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label>Hours : </label>
          <textarea placeholder="Hours" class="form-control  " id="hours" name="hours"
            autocomplete="off">{{ $data->hours ?? '' }}</textarea>
        </div>
        <div class="card-footer">
          <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $data->id ?? ''}}" />
          <button type="submit" class="btn btn-primary mr-2">{{ $data ? 'Update' : 'Add'}}</button>
          <a href="{{ route('admin.dashboard')  }}" type="button" class="btn btn-secondary cancel">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@foreach(config('layout.resources.ckeditor_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
@foreach(config('layout.resources.validate_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
{!! JsValidator::formRequest('App\Http\Requests\Backend\ContactUsRequest') !!}
<script>
  $(document).ready(function() {
     $('.office_name').on('change', function() {
      $('#address').val('');
      $('#email').val('');
      $('#cell_phone').val('');
      $('#telephone').val('');
      $('#international_call').val('');
       var office = $(this).find("option:selected").val();
       $.ajax({
            url: '{{ url("admin/contact-us/edit") }}/'+ office,
            dataType: "json",
            beforeSend: function() {
            $("#loading").show();
            },
            complete: function() {
            $("#loading").hide();
            },
            success: function(data) {
                if(data.result != ''){
                $('#address').val(data.result.address);
                $('#email').val(data.result.email);
                $('#cell_phonee').val(data.result.cell_phone);
                $('#telephone').val(data.result.telephone);
                $('#international_call').val(data.result.international_call);
                $('#hours').val(data.result.hours);
                $('#hidden_id').val(data.result.id);
                $('#action').val('Edit');
                } else{
                    $('#action').val('Add');
                    $('#hidden_id').val('');
                }
            }
        })
     });
  });
</script>
@endsection