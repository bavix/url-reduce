/**
 * @author rez1dent3
 * @year 2017
 * @company bavix
 * @site bavix.ru
 * @site babichev.net
 */
$(function () {

    // clipboard
    var clipboard = new Clipboard('button.clipboard');

    clipboard.on('success', function (e) {
        var $button = $(e.trigger);
        $button.tooltip('show');

        setTimeout(function () {
            $button.tooltip('dispose');
        }, 2300);

        e.clearSelection();
    });

    $('form.bx-form').submit(function (e) {

        e.preventDefault();

        var $collapse = $('#collapse');
        var $qr = $collapse.find('#qr-code');
        var $result = $('#result');
        var $form = $(this);
        var url = $form.find('input[name=url]').val().trim();

        $result.val('');

        $qr.attr('src', 'https://ds.bavix.ru/svg/logo.svg');

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: {
                url: url,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {

                if (typeof res.error !== "undefined") {

                    $form.find('.form-group')
                        .addClass('has-danger')
                        .find('input')
                        .addClass('form-control-danger');

                    $form.find('.form-group .form-control-feedback')
                        .text(res.error);

                } else {

                    $collapse.collapse('show');

                    $form.find('.form-group')
                        .removeClass('has-danger')
                        .find('input')
                        .removeClass('form-control-danger');

                    $form.find('.form-group .form-control-feedback')
                        .text('');

                    $qr.attr('src', 'https://' + location.host + '/qr/' + res.hash);
                    $result.val('https://' + location.host + '/' + res.hash);
                }

            },
            error: function (res) {

                $form.find('.form-group')
                    .addClass('has-danger')
                    .find('input')
                    .addClass('form-control-danger');

                $form.find('.form-group .form-control-feedback')
                    .text(typeof res.error !== "undefined" ? res.error : res);

            }
        });

    });

});
