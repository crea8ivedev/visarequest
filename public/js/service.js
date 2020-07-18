function simplifyResponseHandler(data) {
    var $paymentForm = $("#paymentForm");
    // Remove all previous errors
    $(".error").remove();
    // Check for errors
    if (data.error) {
        // Show any validation errors
        if (data.error.code == "validation") {
            var fieldErrors = data.error.fieldErrors,
                    fieldErrorsLength = fieldErrors.length,
                    errorList = "";
            for (var i = 0; i < fieldErrorsLength; i++) {
                errorList += "<div class='error'>Field: '" + fieldErrors[i].field +
                        "' is invalid - " + fieldErrors[i].message + "</div>";
            }
            // Display the errors
            $paymentForm.after(errorList);
        }
        // Re-enable the submit button
        $("#process-payment-btn").removeAttr("disabled");
    } else {
        // The token contains id, last4, and card type
        var token = data["id"];
        // Insert the token into the form so it gets submitted to the server
        $paymentForm.append("<input type='hidden' name='simplifyToken' value='" + token + "' />");
        // Submit the form to the server
        $paymentForm.get(0).submit();
    }
}
$(document).ready(function () {
    $(document).on('click', '.btnPaymentModal', function () {
        $('.modal').modal('hide');
        $("#paymentForm")[0].reset();
        $('#paymentModal').modal('show');
    });
    $(document).on('click', '.btnContactAgent', function () {
        $('.modal').modal('hide');
        $("#agentForm")[0].reset();
        $('#agentModal').modal('show');
    });
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

    $("#paymentForm").on("submit", function() {
        // Disable the submit button
        $("#process-payment-btn").attr("disabled", "disabled");
        // Generate a card token & handle the response
        SimplifyCommerce.generateToken({
            key: "YOUR_PUBLIC_KEY",
            card: {
                number: $("#ccNumber").val(),
                cvc: $("#cvc").val(),
                expMonth: $("#ccExpMonth").val(),
                expYear: $("#ccExpYear").val()
            }
        }, simplifyResponseHandler);
        // Prevent the form from submitting
        return false;
    });
});