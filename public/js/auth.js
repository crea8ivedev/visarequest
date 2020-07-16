$(document).on('click', '.btn-login', function () {
    $("#loginForm")[0].reset();
    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
});
$(document).on('click', '.btn-signup', function () {
    $("#signupForm")[0].reset();
    $('#registerModal').modal('show');
    $('#loginModal').modal('hide');
});
$(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        $("#errorMessage").html('');
        var formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "/login",
            data: formData,
            success: function (data, textStatus, jqXHR) {
                var result = data;
                if (result.status) {
                    window.location.reload();
                } else {
                    $("#loginForm")[0].reset();
                    $("#errorMessage").html(result.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
    $('#signupForm').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "/register",
            data: formData,
            success: function (data, textStatus, jqXHR) {
                var result = data;
                if (result.status) {
                    window.location.reload();
                } else {
                    $("#errorMessage").html(result.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
});
