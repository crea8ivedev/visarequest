{{-- Extends layout --}}
@extends('backend.layout.default')

{{-- Styles Section --}}
@section('styles')

    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .hide {
            display: none;
        }
        .select2-container {
          width: 100% !important;
        }
        .select2 {
          display: block;
        }
    </style>

@endsection

{{-- Content --}}
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card card-custom">
      <div id="showResponseArea" class="showResponseArea alert hide">
          <span>
              <strong id="alertType">Success !! </strong>Your request <span id="requestId"> // Request id goes here</span> 
          </span>
      </div>

        <div class="card-header">
          <div class="card-title">
            <span class="card-icon"><i class="flaticon2-heart-rate-monitor text-primary"></i></span>
            <h3 class="card-label">Services List</h3>
          </div>
        </div>
        <div class="card-body">
          <div class="mb-7">
            <div class="row align-items-center">
              <div class="col-lg-9 col-xl-8">
                <div class="row align-items-center">
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                      <input type="text" class="form-control search" placeholder="Search by name..." id="kt_datatable_search_query">
                      <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
                  </div>
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                      <label class="mr-5 mb-2 my-md-0 d-none ">Country:</label>
                        <select class="form-control  country_id " id="country_id" name="country_id">
                          <option value="">Select Country</option>
                           @foreach($country_list as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <table class="table table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="services_table">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Staff Name</th>
                        <th>Agent Name</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Normal Price</th>
                        <th>Discount Price</th>
                        <th>Commission</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
          </div>
        </div>
    </div>
  </div>
  <div class="col-md-4">
    <!--begin::Card-->
    <div class="card card-custom card-collapse"   data-card="true" id="kt_card">
        <div class="card-header">
          <div class="card-title">
              <h3 class="card-label">Services</h3>
          </div>
          <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1 add_new" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Add New" data-original-title="Toggle Card">
              <i class="ki ki-arrow-down icon-nm"></i>
            </a>
          </div>
        </div>
        
        <div class="card-body" id="card-collapse"  style="display: none;">
          <!--begin::Form-->
          <form class="form" method="post" id="sample_form">
            @csrf
              <div class="form-group">
                <label>Country Name</label>
                
                <select class="form-control form-control-solid select2" id="country_id" name="country_id">
                  <option value="">Select Country</option>
                   @foreach($country_list as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                   @endforeach
                </select>
                
              </div>
              <div class="form-group">
                <label>Staff Name</label>
                <select class="form-control form-control-solid select2" id="staff_id" name="staff_id">
                  <option value="">Select Staff</option>
                   @foreach($staff_list as $staff)
                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Agent Name</label>
                <select class="form-control form-control-solid select2" id="agent_id" name="agent_id">
                  <option value="">Select Agent</option>
                   @foreach($agent_list as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Name</label>
                <div class="input-group">
                  <input class="form-control" id="name" name="name" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <div class="input-group">
                  <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label>Normal Price</label>
                <div class="input-group">
                  <input class="form-control" id="normal_price" name="normal_price" placeholder="Normal price">
                </div>
              </div>
              <div class="form-group">
                <label>Discount Price</label>
                <div class="input-group">
                  <input class="form-control" id="discount_price" name="discount_price" placeholder="Discount price">
                </div>
              </div>
              <div class="form-group">
                <label>Commission</label>
                <div class="input-group">
                  <input class="form-control" id="commission" name="commission" placeholder="commission">
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
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-titles">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('js/pages/features/cards/tools.js') }}"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/dist/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/select2/select2.min.js') }}" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
       $('.select2').select2();
    var table =  $('#services_table').DataTable({
          processing: false,
          serverSide: true,
          responsive : true,
          autoWidth:false,
          // DOM Layout settings
          dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
           ajax: {
             url: "{{ route('admin.service') }}",
             data: function (d) {
                  d.country_id = $('.country_id').val();
                  d.search = $('.search').val();
              },
            },
            columns: [
             {
              data: 'country.name',
              name: 'country.name',
              width: 20,
             },
             {
              data: 'staff.name',
              name: 'staff.name',
              width: 200,
             },
             {
              data: 'agent.name',
              name: 'agent.name',
              width: 200,
             },
             {
              data: 'name',
              name: 'name',
              width: 200,
             },
             {
              data: 'description',
              name: 'description',
              width: 0,
             },
             {
              data: 'normal_price',
              name: 'normal_price',
              width: 0,
             },
             {
              data: 'discount_price',
              name: 'discount_price',
              width: 0,
             },
             {
              data: 'commission',
              name: 'commission',
              width: 0,
             },
             {
              data: 'action',
              name: 'action',
              width: 700,
              orderable: false
             }
          ]
      });

      table.on('preXhr', function(evt, settings) {
        if (settings.jqXHR) {
            settings.jqXHR.abort();
        }
      })

      $('.country_id').on('change',function(){
         table.draw();
      });

      $('.search').on('keyup', function() {
          table.draw();
      });
      $('.select2').select2({container: 'body'})
      // validate signup form on keyup and submit
      var validator =  $("#sample_form").validate({
        rules: {
          country_id  : "required",
          staff_id    : "required",
          agent_id    : "required",
          name        : "required",
          description : "required",
          normal_price: "required",
        },
        messages: {
          country_id : "Please select country",
          staff_id   : "Please select staff",
          agent_id   : "Please select agent",
          name       : "Please enter service name",
          description: "Please enter description",
          normal_price: "Please enter normal price",
        },
        highlight: function(element, errorClass, validClass) {
          $(element).closest('.form-group').find(".form-control:first").addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).closest('.form-group').find(".form-control:first").removeClass('is-invalid');
          $(element).closest('.form-group').find(".form-control:first").addClass('is-valid');
        },
        errorElement: 'span',
        errorClass: 'invalid-feedback',
        errorPlacement: function(error, element) {
          // Append error within linked label
          if(element.hasClass('select2') && element.next('.select2-container').length) {
            error.insertAfter(element.next('.select2-container'));
          } else if (element.parent('.input-group').length) {
              error.insertAfter(element.parent());
          } else {
              error.insertAfter(element);
          }
        },
        submitHandler: function(form) {
        }
         
      });

      //If the change event fires we want to see if the form validates.
 
      $('select').on('change', function() {  // when the value changes
        $(this).valid(); // trigger validation on this element
      });

      $(".cancel").click(function() {
        validator.resetForm();
        $(".select2").val('').trigger('change') ;
        $('#action').val('Add');
        $('#card-collapse').toggle();
      });

      $('#sample_form').on('submit', function(event) {
        event.preventDefault();
        var need_visa = $(".need_visa:checked").val();
        console.log(need_visa);
        var $form = $(this);
        var action_url = '';

        if($('#action').val() == 'Add')
        {
         action_url = "{{ route('admin.service.store') }}";
        }

        if($('#action').val() == 'Edit')
        {
         action_url = "{{ route('admin.service.update') }}";
        }

        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(! $form.valid()) return false;
        $.ajax({
           url: action_url,
           method:"POST",
           data:$(this).serialize(),
           dataType:"json",
           success:function(data)
           {
            var html = '';
            if(data.errors)
            {
                $(".showResponseArea").removeClass("hide");
                $(".showResponseArea").removeClass("alert-success");
                $(".showResponseArea").addClass("alert-danger");
                $("#alertType").text("Error !!");
                $("#requestId").text(data.errors);
            }
            if(data.success)
            {
                $('#sample_form')[0].reset();
                $('#services_table').DataTable().ajax.reload();
                $('#formModal').modal('hide');
                $(".showResponseArea").removeClass("hide");
                $(".showResponseArea").removeClass("alert-danger");
                $(".showResponseArea").addClass("alert-success");
                $("#alertType").text("Success !!");
                $("#requestId").text(data.success);
                $('#card-collapse').hide();
            }
           }
        });
          setTimeout(function() { $("#showResponseArea").addClass('hide'); }, 10000);
      });

      $(document).on('click', '.add_new', function() {
        $('#card-collapse').toggle();
        $('.password_hide_show').show();
        $("#sample_form").trigger("reset");
        $(".select2").val('').trigger('change') ;
        $('#sample_form')
          .find("input,textarea,select")
          .removeClass('is-invalid')
          .find('.invalid-feedback').hide();
        $('#action').val('Add');
      });

      $(document).on('click', '.edit', function() {
        $('#card-collapse').show();
        $('.password_hide_show').hide();
        var id = $(this).attr('id');
        var url = '{{ route("admin.service.edit", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
           url :url,
           dataType:"json",
           success:function(data)
           {
            
            $('#country_id').select2('val', [data.result.country_id]);
            $('#staff_id').select2('val', [data.result.staff_id]);
            $('#agent_id').select2('val', [data.result.agent_id]);
            $('#name').val(data.result.name);
            $('#description').val(data.result.description);
            $('#normal_price').val(data.result.normal_price);
            $('#discount_price').val(data.result.discount_price);
            $('#commission').val(data.result.commission);
            $('#hidden_id').val(id);
            $('#action').val('Edit');
           }
        })
     });

     var service_id;

     $(document).on('click', '.delete', function(){
      service_id = $(this).attr('id');
      $('#confirmModal').modal('show');
     });

     $('#ok_button').click(function(){
        var url = '{{ route("admin.service.destroy", ":id") }}';
        url = url.replace(':id', service_id);
        $.ajax({
         url: url,
         beforeSend:function(){
          $('#ok_button').text('Deleting...');
         },
         success:function(data)
         {
          setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#services_table').DataTable().ajax.reload();
           //alert('Data Deleted');
          $(".showResponseArea").removeClass("hide");
          $(".showResponseArea").removeClass("alert-danger");
          $(".showResponseArea").addClass("alert-success");
          $("#alertType").text("Success !!");
          $("#requestId").text('Successfully Data Deleted');
          }, 2000);
         }
        })
      setTimeout(function() { $("#showResponseArea").addClass('hide'); }, 5000);
     });


    });

     
</script>
@endsection