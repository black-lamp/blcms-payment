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
            console.log(paymentMethod);

            /*Title settings*/
            var title = $('#payment-title');
            $(title).text(paymentMethod['translations'][0]['title']);

            /*Description setting*/
            var description = $('#payment-description');
            $(description).text(paymentMethod['translations'][0]['description']);

            /*Image settings*/
            var image = $('#payment-image');
            $(image).attr('src', paymentMethod['image']);


            //
            // /*METHOD LOGO SETTING*/
            // var methodLogo = $('#delivery-logo');
            // $(methodLogo).attr('src', method.image_name);
            //
            // /*METHOD TITLE SETTING*/
            // var methodTitle = $('#delivery-title');
            // $(methodTitle).text(method.translations[1]['title']);
            //
            // /*METHOD DESCRIPTION SETTING*/
            // var methodDescription = $('#delivery-description');
            // $(methodDescription).html(method.translations[1]['description']);
            //
            // var postOfficeField = $('.post-office');
            // var addressFields = $('div.address');
            //
            // switch (method.show_address_or_post_office) {
            //     case '0' :
            //         postOfficeField.hide();
            //         addressFields.hide();
            //         break;
            //     case '1' :
            //         postOfficeField.hide();
            //         addressFields.show();
            //         break;
            //     case '2' :
            //         postOfficeField.show();
            //         addressFields.hide();
            // }
        }
    });
}