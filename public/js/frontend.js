$(document).ready(function () {

    $(document).on('change', '.country', function () {
        $.ajax({
            url: "set-country",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: { country: $(this).value },
            success: function (data, textStatus, jqXHR) {

            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $(document).on('click', '.service-category', function () {
        $.ajax({
            url: "get-services",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: { country: $(".country").val(), category: $(this).data('id') },
            success: function (data, textStatus, jqXHR) {
                $(".service-list").html(data.html);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

});