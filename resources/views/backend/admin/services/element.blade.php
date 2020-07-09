@extends('backend.layout.default')
@section('content')
<div class="col-md-12">
  <div class="card card-custom card-collapse" data-card="true" id="kt_card_4">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">Service Input</h3>
      </div>
    </div>
    <form class="form" method="post" id="service_element_form" action="{{ route('admin.service.element.store')  }}">
      @csrf
      <div class="card-body">
        <div>
          <h4>{{$serviceElement->name}}</h4>
        </div>
        <div class="form-group row">
          <div class="col-lg-12" id="builderForm">
            <input type="hidden" id="dataHdn" name="dataHdn" />
            <input type="hidden" id="serviceId" name="serviceId" value="{{$id}}" />
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-lg-6">
            <button type="button" id="btnSubmit" class="btn btn-primary mr-2">Update</button>
            <button type="button" id="clear-all-fields" class="btn btn-info mr-2">Clear</button>
            <a href="{{route('admin.service')}}" type="button" class="btn btn-secondary">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script>
  $(document).ready(function() {
    var data = <?php echo ($serviceElement->data) ? $serviceElement->data : 'null'; ?>;
    var options = {
      showActionButtons: false,
      disabledAttrs: ['access', 'name', 'className', 'inline', 'max', 'other', 'rows', 'step', 'style', 'toggle', 'value', 'maxlength', 'min', 'multiple'],
      disabledSubtypes: {
        text: ['password', 'color', 'tel']
      },
      defaultFields: (data === 'null') ? [] : data,
      disableFields: ['button', 'hidden', 'header', 'starRating', 'autocomplete'],
      controlOrder: ['text', 'textarea', 'select', 'date', 'paragraph', 'checkbox-group', 'radio-group', 'file', 'number']
    };

    var formBuilder = $(document.getElementById('builderForm')).formBuilder(options);
    document.getElementById('clear-all-fields').onclick = function() {
      formBuilder.actions.clearFields();
    };
    document.getElementById('btnSubmit').addEventListener('click', function() {
      var dataHdn = formBuilder.actions.getData('json', true);
      $("#dataHdn").val(dataHdn)
      $("#service_element_form").submit();
    });
  });
</script>
@endsection