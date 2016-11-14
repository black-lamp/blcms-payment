/*This script gets delivery method info used CartController by Blcms-Shop module*/

$(document).ready(function () {

    /*AFTER PAGE LOAD ELEMENT SETTINGS*/
    var radioButtons = $('#payment-selector input[type="radio"]');
    $(radioButtons[0]).attr("checked", "checked");

    getPaymentMethodInfo($(radioButtons[0]).val());

    /*SELECTED ELEMENT SETTINGS*/
    var inputs = $('#payment-selector input[type="radio"]');
    inputs.change(function () {
        if (this.checked) {
            var elementValue = this.value;
            getPaymentMethodInfo(elementValue);
        }
    });
});

/*GETTING METHOD INFO BY IT VALUE*/
function getPaymentMethodInfo(elementValue) {
    $.ajax({
        type: "GET",
        url: '/payment/default/get-payment-method-info',
        data: {
            'id': elementValue
        },
        success: function (data) {

            var paymentMethod = $.parseJSON(data).paymentMethod;

            /*Title settings*/
            var title = $('#payment-title');
            $(title).text(paymentMethod['translations'][0]['title']);

            /*Description setting*/
            var description = $('#payment-description');
            $(description).text(paymentMethod['translations'][0]['description']);

            /*Image settings*/
            var image = $('#payment-image');
            $(image).attr('src', paymentMethod['image']);
        }
    });
}