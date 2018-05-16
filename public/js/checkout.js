// Stripe.setPublishableKey('pk_test_u0TcAzIsIzlWVXik1oR1Hs6P');

// var $form = $('#checkout-form');
// $form.submit(function(event) {
//     $('#charge-error').addClass('hidden');
//     $form.find('button').prop('disabled', true);    //for not to suspended the application, froze button
//     stripe.createToken({
//         number: $('#card-number').val(),
//         cvc: $('#card-cvc').val(),
//         exp_month: $('#card-expiry-month').val(),
//         exp_year: $('#card-expiry-year').val(),
//         name: $('#card-name').val()
//     }, stripeResponseHandler);
//     return false;               //don't continue with the form submit, we must wait for validate, wait a second, dont't continue form submission
// });

// function stripeResponseHandler(status, response) {
//     if(response.error) {
//         $('#charge-error').removeClass('hidden');
//         $('#charge-error').text(response.error.message);
//         $form.find('button').prop('disabled', false);
//     } else {
//         var token = response.id;
//         $form.append($('<input type="hidden" name="stripeToken" />').val(token));
//         $form.get(0).submit();
//     }
// }
