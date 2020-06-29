{{-- Extends layout --}}
@extends('backend.layout.default')

{{-- Styles Section --}}
@section('styles')

    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .hide {
            display: none;
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
            <h3 class="card-label">Country List</h3>
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
                      <label class="mr-5 mb-2 my-md-0 d-none ">Need Visa:</label>
                        <select name="visa_filter" id="visa_filter" id="kt_datatable_search_status" class="form-control visa_filter">
                              <option value="">Need Visa</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                        </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <table class="table table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="country_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Need Visa</th>
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
              <h3 class="card-label">country</h3>
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
                <label>Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Country name" />
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <div class="input-group">
                  <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                </div>
              </div>
              <div class="form-group">
                  <label>Need Visa ?</label>
                  <div class="radio">
                      <label class="radio" id="need_visa_yes">
                          <input type="radio" name="need_visa" id="need_visa_yes"  class="form-control need_visa" value="1" checked="" /> Yes
                          <span></span>
                      </label>
                      <label class="radio" id="need_visa_no">
                          <input type="radio" name="need_visa" id="need_visa_no"  class="form-control need_visa" value="0" /> No
                          <span></span>
                      </label>
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
    <script>
    $(document).ready(function() {
    var table =  $('#country_table').DataTable({
          processing: false,
          serverSide: true,
          responsive : true,
          // DOM Layout settings
          dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
           ajax: {
             url: "{{ route('admin.country') }}",
             data: function (d) {
                  d.need_visa = $('.visa_filter').val();
                  d.search = $('.search').val();
              },
            },
            columns: [
             {
              data: 'name',
              name: 'name'
             },
             {
              data: 'description',
              name: 'description'
             },
             {
              data: 'need_visa',
              name: 'need_visa',
             },
             {
              data: 'action',
              name: 'action',
              orderable: false
             }
          ]
      });

      table.on('preXhr', function(evt, settings) {
        if (settings.jqXHR) {
            settings.jqXHR.abort();
        }
      })

      $('.visa_filter').on('change',function(){
         table.draw();
      });

      $('.search').on('keyup', function() {
          table.draw();
      });
      // validate signup form on keyup and submit
      var validator =  $("#sample_form").validate({
        rules: {
          name: "required",
          description: "required",
          need_visa: "required",
        },
        messages: {
          name: "Please enter country name",
          description: "Please enter description",
          need_visa: "Please select need visa",
        },
        highlight: function(element) {
          $(element).closest('.form-group').find(".form-control:first").addClass('is-invalid');
        },
        unhighlight: function(element) {
          $(element).closest('.form-group').find(".form-control:first").removeClass('is-invalid');
          $(element).closest('.form-group').find(".form-control:first").addClass('is-valid');
        },
        errorElement: 'span',
        errorClass: 'invalid-feedback',
        submitHandler: function(form) {
        }
         
      });

      $(".cancel").click(function() {
        validator.resetForm();
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
         action_url = "{{ route('admin.country.store') }}";
        }

        if($('#action').val() == 'Edit')
        {
         action_url = "{{ route('admin.country.update') }}";
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
                $('#country_table').DataTable().ajax.reload();
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
        $('#sample_form')
          .find("input,textarea,select")
          .removeClass('is-invalid')
        //    .end()
        //   .find("input[type=checkbox], input[type=radio]")
        //     .prop("checked", "")
        //     .end()
          .find('.invalid-feedback').hide();
        $('#action').val('Add');
      });

      $(document).on('click', '.edit', function() {
        $('#card-collapse').show();
        $('.password_hide_show').hide();
        var id = $(this).attr('id');
        var url = '{{ route("admin.country.edit", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
           url :url,
           dataType:"json",
           success:function(data)
           {
            $('#name').val(data.result.name);
            $('#description').val(data.result.description);
            var $radios = $('input:radio[name=need_visa]');
              $radios.filter('[value='+ data.result.need_visa +' ]').prop('checked', true);
            
            $('#hidden_id').val(id);
            $('#action').val('Edit');
           }
        })
     });

     var country_id;

     $(document).on('click', '.delete', function(){
      country_id = $(this).attr('id');
      $('#confirmModal').modal('show');
     });

     $('#ok_button').click(function(){
        var url = '{{ route("admin.country.destroy", ":id") }}';
        url = url.replace(':id', country_id);
        $.ajax({
         url: url,
         beforeSend:function(){
          $('#ok_button').text('Deleting...');
         },
         success:function(data)
         {
          setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#country_table').DataTable().ajax.reload();
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