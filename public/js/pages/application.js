$(document).ready(function() {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    var table = $('#application_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        ajax: {
            type: 'post',
            url: "application",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            data: function(d) {
                d.search = $('.search').val();
            },
        },
        columns: [{
                data: 'service.name',
                name: 'service.name'
            },
            {
                data: 'userName',
                name: 'userName',
            },
            // {
            //     data: 'service.country.name',
            //     name: 'Country Name',
            // },
            {
                data: 'staffName',
                name: 'Staff Name',
            },
            {
                data: 'service.commission',
                name: 'Commission'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
        ]
    });

    table.on('preXhr', function(evt, settings) {
        if (settings.jqXHR) { // $button .= '<a href="/admin/service/element/' . $data->id . '"  name="element" id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Add Element"><i class="la la-plus"></i></a>';

            settings.jqXHR.abort();
        }
    })

    $('.search').on('keyup', function() {
        table.draw();
    });

     $(document).on('click', '.view_application', function() {
        var id = $(this).attr('id');
        var url = 'application/view_application/'+ id;
       // url = url.replace(':id', id);
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
                $('#hidden_id').val(id);
                $('.modal-title').text('Edit Record');
                $('#action_button').val('Edit');
                $('#action').val('Edit');
                $('#service_name').text(data.data.service.name);
                $('#html_render').html(data.html);
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
                var url = 'application/destroy/' + id;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "POST",
                    dataType: "json",
                    success: function(res) {
                        if (res.status != 400) {
                            swal.fire(
                                "Deleted!",
                               res.success,
                                "success"
                            )
                            $('#application_table').DataTable().ajax.reload();
                        } else {
                            swal.fire(
                                "Cancelled",
                                "This Record used other table :)",
                                "error"
                            )
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal.fire("Error deleting!", "Please try again", "error");
                    }
                });
            } else if (result.dismiss === "cancel") {
                swal.fire(
                    "Cancelled",
                    "Your imaginary file is safe :)",
                    "error"
                )
            }
        });
    });
});