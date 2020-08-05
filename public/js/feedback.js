
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
            url: '/feedback',
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend: function() {
                $('.disableBtn').attr("disabled", true);
            },
            complete: function(){
                $('.disableBtn').attr("disabled", false);
            },
            success:function(data)
            {
            var html = '';
            if(data.errors)
            {
                $(".alertMessage").text(data.errors);

            }
            if(data.success)
            {
                $('#contact_form')[0].reset();
                $(".alertMessage").html(data.success);
            }
            }
        });
            setTimeout(function() { $("#showResponseArea").addClass('d-none'); }, 10000);
    });
});