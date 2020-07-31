 $(document).ready(function() {

 $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
  var table =  $('#feedback_table').DataTable({
        processing: true,
        serverSide: true,
        responsive : true,

        // DOM Layout settings
        dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
          ajax: {
          type:'post',
           url: "feedback",
           headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },

           data: function (d) {
                d.search = $('.search').val();
            },
          },
          columns: [
           {
            data: 'type',
            name: 'type'
           },
            {
            data: 'name',
            name: 'name'
           },
           {
            data: 'email',
            name: 'email'
           },
          
           {
            data: 'message',
            name: 'message'
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

    $('.search').on('keyup', function() {
        table.draw();
    });

     $(document).on('click', '.reply', function() {
        var id = $(this).attr('id');
        var url = 'feedback/reply/'+ id;
        $('#form_result').html('');
        $.ajax({
           url :url,
           dataType:"json",
           beforeSend: function() {
             $("#loading").show();
           },
            complete: function() {
             $("#loading").hide();
           },
           success:function(data)
           {
            $('#name').text(data.result.name);
            if(data.result.email != '' && data.result.email != null) {
              $('#email').text(data.result.email);
            } else {
               $('#email').text('-');
            }
            $('#date').text(data.result.date);
            $('#message').text(data.result.message);
            $('#comment').val(data.result.comment);
            $('#hidden_id').val(id);
            $('.modal-title').text('Edit Record');
            $('#action_button').val('Edit');
            $('#action').val('Edit');
            $('#formModal').modal('show');
           }
        })
     });

    $(document).on('click', '.delete', function() {
      var id = $(this).attr('id');
      swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!"
      }).then(function(result) {
         if (result.value) {
          var url = 'feedback/destroy/'+ id;
          $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: url,
              type: "POST",
              dataType: "json",
              success: function (res) {
                if (res.status != 400 ) {
                   swal.fire(
                        "Deleted!",
                       res.success,
                        "success"
                    )
                   $('#feedback_table').DataTable().ajax.reload();
                } else {
                  swal.fire(
                    "Cancelled",
                    "This Record used other table :)",
                    "error"
                  )
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  swal.fire("Error deleting!", "Please try again", "error");
              }
          });
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Your imaginary file is safe :)",
                "error"
            )
        }
     });
    });

  });