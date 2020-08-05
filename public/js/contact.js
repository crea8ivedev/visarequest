
$(document).ready(function () {
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
                $('#contact_form')[0].reset();
                $(".alertMessage").html('<p class="text-success">'+data.success+'</p>');
            }
            }
        });
    });
});