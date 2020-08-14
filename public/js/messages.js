$(document).ready(function() {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    var table = $('#message_table').DataTable({
        "dom": '<"top"i>rt<"bottom"fp><"clear">',
        processing: true,
        serverSide: true,
        responsive: true,
        "searching": false,
        ajax: {
            type: 'post',
            url: "messages",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
        columns: [
            {
                data: 'date',
                name: 'Date'
            },
            {
                data: 'subject',
                name: 'Subject',
            },{
                data: 'message',
                name: 'Message',
            },{
                data: 'FullName',
                name: 'By',
            },
            {
                data: 'attechment',
                name: 'Attechment',
            },
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


    $(document).on('click', '.open-applicationModal', function() {
        $('.applicationModal').modal('show');
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
            url: 'application-reply',
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

});