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
                data: 'service.category.name',
                name: 'service.category.name'
            },
            {
                data: 'service.name',
                name: 'service.name'
            },
            {
                data: 'userName',
                name: 'userName',
            },
            {
                data: 'staffName',
                name: 'Staff Name',
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

     $(document).on('click', '.view_application_btn', function() {
        var id = $(this).data('id');
        var url = 'application/view/'+ id;
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
                $('.html_render').html(data.html);
                $('.applicationModal').modal('show');
           }
        })
    });


    $(document).on('click', '.edit_application_btn', function() {
        var id = $(this).data('id');
        var url = 'application/edit/'+ id;
        $('.html_render').html('');
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
                $('.html_render').html(data.html);
                $('.applicationModal').modal('show');
           }
        })
    });

    $(document).on('click', '.reply_application_btn', function() {
        var id = $(this).data('id');
        var url = 'application/reply/'+ id;
        $('.html_render').html('');
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
                $('.html_render').html(data.html);
                $('.applicationModal').modal('show');
           }
        })
    });

    $('body').on('click','.btn_send_reply', function(event) {
        event.preventDefault();
        var $form = $('#application_reply_form');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // if(! $form.valid()) return false;
        var form = $('#application_reply_form')[0];
        var data = new FormData(form);
        $.ajax({
            url: 'application/application-reply',
            method: "POST",
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                $('.disableBtn').attr("disabled", true);
            },
            complete: function(){
                $(".disableBtn").attr("disabled", false);
            },
            success:function(data)
            {
            if(data.errors)
            {
                $(".alertMessage").html('<p class="text-danger">'+data.errors+'</p>');
            }
            if(data.success)
            {
               $(".reply_application_btn").trigger( "click" );
            }
            }
        });
    });


    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
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