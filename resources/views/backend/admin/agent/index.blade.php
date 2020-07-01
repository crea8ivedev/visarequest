{{-- Extends layout --}}
@extends('backend.layout.default')

{{-- Styles Section --}}
@section('styles')
    
    {{-- datatable css--}}
    @foreach(config('layout.resources.datatable_css') as $style)
        <link href="{{  asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

@endsection

{{-- Content --}}
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-custom">

      <div id="showResponseArea" class="showResponseArea alert hide">
          <span>
              <strong id="alertType">Success !! </strong>Your request <span id="requestId"> // Request id goes here</span> 
          </span>
      </div>

        <div class="card-header">
          <div class="card-title">
            <span class="card-icon"><i class="flaticon2-heart-rate-monitor text-primary"></i></span>
            <h3 class="card-label">Agent List</h3>
          </div>
          <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{route('admin.agent.add')}}" class="btn btn-primary font-weight-bolder">
              <i class="la la-plus"></i>
             Add Agent
            </a>
           <!--end::Button-->
          </div>
        </div>
        <div class="card-body">
            <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <table class="table table-bordered table-checkable dataTable no-footer dtr-inline collapsed" id="agent_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
          </div>
        </div>
    </div>
  </div>

</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}

    {{-- Datatable js--}}
    @foreach(config('layout.resources.datatable_js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    <script>
    $(document).ready(function() {

      $('#agent_table').DataTable({
          processing: false,
          serverSide: true,
          responsive : true,
          // DOM Layout settings
          dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
            ajax: {
             url: "{{ route('admin.agent') }}",
            },
            columns: [
             {
              data: 'name',
              name: 'name'
             },
             {
              data: 'email',
              name: 'email'
             },
             {
              data: 'last_login_at',
              name: 'last_login_at'
             },
             {
              data: 'action',
              name: 'action',
              orderable: false
             }
          ]
      });


      // validate signup form on keyup and submit
      var validator =  $("#sample_form").validate({
        rules: {
          first_name: "required",
          last_name: "required",
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 5
          },
          confirm_password: {
            required: true,
            minlength: 6,
            equalTo: "#password"
          },
        },
        messages: {
          first_name: "Please enter first name",
          last_name: "Please enter last name",
          email: "Please enter a valid email address",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
            equalTo: "Please enter the same password as above"
          },
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
        var $form = $(this);
        var action_url = '';

        if($('#action').val() == 'Add')
        {
         action_url = "{{ route('admin.agent.store') }}";
        }

        if($('#action').val() == 'Edit')
        {
         action_url = "{{ route('admin.agent.update') }}";
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
                $('#agent_table').DataTable().ajax.reload();
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
        $('#sample_form')
        .find("input,textarea,select")
           .val('')
           .removeClass('is-invalid')
           .end()
        .find("input[type=checkbox], input[type=radio]")
           .prop("checked", "")
           .end()
          .find('.invalid-feedback').hide();
        $('#action').val('Add');
      });

      $(document).on('click', '.edit', function() {
        $('#card-collapse').show();
        $('.password_hide_show').hide();
        var id = $(this).attr('id');
        var url = '{{ route("admin.agent.edit", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
           url :url,
           dataType:"json",
           success:function(data)
           {
            $('#first_name').val(data.result.first_name);
            $('#last_name').val(data.result.last_name);
            $('#email').val(data.result.email);
            $('#hidden_id').val(id);
            $('#action').val('Edit');
           }
        })
     });

     var agent_id;

     $(document).on('click', '.delete', function(){
      agent_id = $(this).attr('id');
      $('#confirmModal').modal('show');
     });

     $('#ok_button').click(function(){
        var url = '{{ route("admin.agent.destroy", ":id") }}';
        url = url.replace(':id', agent_id);
        $.ajax({
         url: url,
         beforeSend:function(){
          $('#ok_button').text('Deleting...');
         },
         success:function(data)
         {
          setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#agent_table').DataTable().ajax.reload();
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