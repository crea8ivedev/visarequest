$(document).ready(function () {
    $(".country").select2();
    $('body').on('change','.country',function() {
        var country = $(this).val();
        if(country != '') {
          window.location.href = serviceUrl.replace(':country', country);
        }
    });

    $(document).on('click', '.service-category', function () {
        $.ajax({
            url: "/getservices",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: { category: $(this).data('id'),country: $('.country').val()},
            success: function (data, textStatus, jqXHR) {
                $(".service-list").html(data.html);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

});