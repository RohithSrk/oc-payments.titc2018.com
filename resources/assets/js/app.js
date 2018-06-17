
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

(function ($) {
    'use strict';

    var paymentType = $('#payment-type');
    var depField1 = $('#dep-field-1');

    paymentType.on('change', function(){
        var input = depField1.find('input');
        var label = depField1.find('label');

        if($(this).val() == 'offline'){
            label.text('OC Member Name');
            input.attr('placeholder', 'OC Member Name');
            input.attr('id', 'oc-member-name');
            input.attr('name', 'oc-member-name');
        }else{
            label.text('Townscript ID');
            input.attr('placeholder', 'Townscript ID');
            input.attr('id', 'townscript-id');
            input.attr('name', 'townscript-id');
        }
    });

})(jQuery);