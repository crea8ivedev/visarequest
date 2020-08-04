
$(document).ready(function () {
    //contact us Submit
    $('#contact_form').on('submit', function(event) {
        event.preventDefault();
        var $form = $(this);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(! $form.valid()) return false;
        $.ajax({
            url: '/contact',
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend: function() {
                $( "#submit" ).removeClass("d-none");
            },
            complete: function(){
                $( "#submit" ).addClass( "d-none");
            },
            success:function(data)
            {
            var html = '';
            if(data.errors)
            {
                $(".showResponseArea").removeClass("d-none");
                $(".showResponseArea").removeClass("alert-success");
                $(".showResponseArea").addClass("alert-danger");
                $(".contactmessage").text(data.errors);
            }
            if(data.success)
            {
                $('#contact_form')[0].reset();
                $(".showResponseArea").removeClass("d-none");
                $(".showResponseArea").removeClass("alert-danger");
                $(".showResponseArea").addClass("alert-success");
                $(".contactmessage").text(data.success);
            }
            }
        });
            setTimeout(function() { $("#showResponseArea").addClass('d-none'); }, 10000);
    });
});