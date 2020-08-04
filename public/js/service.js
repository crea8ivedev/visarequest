$(document).ready(function () {
    $(".select2").select2();
    $('body').on('change','.country',function() {
        var country = $(this).val();
        if(country != '') {
        var url = '{{ route("frontend.service.country", ":country") }}';
        window.location.href = url.replace(':country', country);
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