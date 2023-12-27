define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
    'use strict';
    
    return Component.extend({
        defaults: {
            template: 'Antunes_teste/knockout-test'
        },
        initialize: function () {
            this.customerName = ko.observableArray([]);
            this.customerData = ko.observable('');
            this._super();
            
            setInterval(this.updateStock.bind(this), 1000);
        },
        updateStock: function () {
            var stockEndpoint = '/rest/V1/test/publicendpoint';
            $.ajax({
                url: stockEndpoint,
                type: 'GET',
                contentType: 'application/json',
                success: function (response) {
                    console.log('Estoque atualizado com sucesso:', response);
                    $('#labelstock').text(response[0]);
                },
                error: function (error) {
                    console.error('Erro ao atualizar o estoque:', error);
                }
            });
        }
    });
});
