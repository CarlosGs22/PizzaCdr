Stripe.setPublishableKey(
    'pk_test_51IlgJAEmgefF22M8mTadCG13TFyKZfx7OuQfun2VNIngCJiSj200HMtYLqdOJfm1USFSqS2PQHPVfAsJElFr6Wq000jqXlQ4U2'
);


//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#btnEnviarPago').removeAttr("disabled");
        //display the errors on the form
        // $('#payment-errors').attr('hidden', 'false');
        $('#payment-errors').addClass('alert alert-danger');
        $("#payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");

        //submit form to the server

        form$.get(0).submit();


    }
}





$(function() {

    $("#paymentFrm").submit(function(e) {


        try {
            e.preventDefault();
            var valid = false;

            if (validacionInput("paymentFrm")) {
                if (validacionSelect("paymentFrm")) {

                    if ($("#myonoffswitch2").val() == "2") {
                        $('#btnEnviarPago').attr("disabled", "disabled");

                        var month = $('#txtMonth').val();

                        var year = $('#txtYeah').val();

                        //create single-use token to charge the user
                        Stripe.createToken({
                            number: $('#txtNumero').val(),
                            cvc: $('#txtCVV').val(),
                            exp_month: month,
                            exp_year: year
                        }, stripeResponseHandler);

                        return false;
                    } else {
                        valid = true;
                    }
                }
            }

            if (valid) this.submit();

        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: '',
                text: 'Ocurrió un error interno'
            });
            console.log(error);
        }

    });
});