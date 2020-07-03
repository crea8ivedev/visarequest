 $(document).ready(function() {

 $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
  var table =  $('#client_table').DataTable({
        processing: true,
        serverSide: true,
        responsive : true,

        // DOM Layout settings
        dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
          ajax: {
          type:'post',
           url: "client",
           headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },

           data: function (d) {
                d.search = $('.search').val();
            },
          },
          columns: [
           {
            data: 'first_name',
            name: 'first_name'
           },
           {
            data: 'last_name',
            name: 'last_name'
           },
           {
            data: 'email',
            name: 'email'
           },
           {
            data: 'phone',
            name: 'phone'
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

    table.on('preXhr', function(evt, settings) {
      if (settings.jqXHR) {
          settings.jqXHR.abort();
      }
    })

    $('.search').on('keyup', function() {
          table.draw();
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
          var url = 'client/destroy/'+ id;
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
                        "Your file has been deleted.",
                        "success"
                    )
                   $('#client_table').DataTable().ajax.reload();
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