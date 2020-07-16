$(document).ready(function () {
    $(document).on('click', '.service-category', function () {
        $.ajax({
            url: "/getservices",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: { category: $(this).data('id'),country: country,service: $(this).data('serviceid')},
            success: function (data, textStatus, jqXHR) {
                $(".service-list").html(data.html);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
});