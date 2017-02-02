$(function () {
    'use strict';

    var clipboard = new Clipboard('#form-result button');

    $('#add-url').submit(function (event) {

        var $form = $(this);
        $form.find('button').button('loading');

        $('#result').val('');

        $.ajax({
            url: $form.attr('action'),
            data: $form.serialize(),
            method: 'POST',
            success: function (response) {
                $form.find('button').button('reset');
                if (response.status == "OK") {
                    if (response.data.link.length > 0) {
                        $('#form-result').show();
                        $('#result').val(response.data.link);
                    }
                    else {
                        // error
                    }
                }
            },
            error: function () {
                $form.find('button').button('reset');
            }
        });

        return false;
    });

    $('#form-result').submit(function () {
        return false;
    });

});