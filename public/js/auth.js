$(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        $(".alertMessage").html('');
        var formData = $(this).serializeArray();
        var $form = $(this);
        if(! $form.valid()) return false;
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "/login",
            data: formData,
            beforeSend: function() {
                $('.disableBtn').attr("disabled", true);
            },
            complete: function(){
                $(".disableBtn").attr("disabled", false);
            },
            success: function (data, textStatus, jqXHR) {
                $("#loginForm")[0].reset();
                if (data.status) {
                    $(".alertMessage").html('<p class="text-success">'+data.message+'</p>');
                    window.location.reload();
                } else {
                    $(".alertMessage").html('<p class="text-danger">'+data.message+'</p>');
                }
            },
            error: function (data, textStatus, errorThrown) {
                $(".alertMessage").html('<p class="text-danger">'+data.message+'</p>');
            }
        });
    });
    $('#signupForm').submit(function (e) {
        e.preventDefault();
        var $form = $(this);
        if(! $form.valid()) return false;
        var formData = $(this).serializeArray();
        $(".alertMessage").html('');
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "/register",
            data: formData,
            beforeSend: function() {
                $('.disableBtn').attr("disabled", true);
            },
            complete: function(){
                $(".disableBtn").attr("disabled", false);
            },
            success: function (data, textStatus, jqXHR) {
                if (data.status) {
                    $(".alertMessage").html('<p class="text-success">'+data.message+'</p>');
                    window.location.reload();
                } else {
                    $(".alertMessage").html('<p class="text-danger">'+data.message+'</p>');
                }
            },
            error: function (data, textStatus, errorThrown) {
                $(".alertMessage").html('<p class="text-danger">'+data.message+'</p>');
            }
        });
    });
});
