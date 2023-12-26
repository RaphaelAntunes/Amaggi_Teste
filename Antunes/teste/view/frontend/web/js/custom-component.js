define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
    'use strict';
    
    return Component.extend({

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
