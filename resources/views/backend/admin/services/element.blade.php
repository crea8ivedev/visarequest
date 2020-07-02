@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Add Element</h3>
      </div>
    </div>
    <form class="form" method="post" id="sample_form" action="{{ route('admin.service.store')  }}">
      @csrf
      <div data-repeater-list="outer-list">
        <div data-repeater-item>
          <input type="text" name="text-input" value="A" />
          <input data-repeater-delete type="button" value="Delete" />

          <!-- innner repeater -->
          <div class="inner-repeater">
            <div data-repeater-list="inner-list">
              <div data-repeater-item>
                <input type="text" name="inner-text-input" value="B" />
                <input data-repeater-delete type="button" value="Delete" />
              </div>
            </div>
            <input data-repeater-create type="button" value="Add" />
          </div>

        </div>
      </div>
      <input data-repeater-create type="button" value="Add" />
    </form>
  </div>
</div>
@endsection
@section('scripts')
@foreach(config('layout.resources.repeater_js') as $script)
<script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
{!! JsValidator::formRequest('App\Http\Requests\Backend\ServiceRequest') !!}
@endsection
<script>
  $(document).ready(function() {
    $('.repeater').repeater({
      repeaters: [{
        selector: '.inner-repeater'
      }]
    });
  });
</script>