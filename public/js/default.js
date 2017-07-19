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
    var $qr = $('#qr-code');
    var $collapse = $('#collapse');
    var $result = $('#result');
    var _token = $('meta[name="csrf-token"]').attr('content');

    clipboard.on('success', function (e) {
        var $button = $(e.trigger);
        $button.tooltip('show');

        setTimeout(function () {
            $button.tooltip('dispose');
        }, 2300);

        e.clearSelection();
    });

    function def(obj, prop, value) {
        if (obj === null) {
            return value;
        }
        if (typeof obj === "undefined") {
            return value;
        }
        if (typeof obj[prop] === "undefined") {
            return value;
        }
        return obj[prop];
    }

    function registerInfo($form, api, url) {
        var id = setInterval(function () {

            $.ajax({
                url: api,
                method: 'POST',
                data: {
                    url: url,
                    _token: _token
                },
                success: function (res) {
                    var title = def(res.parameters, 'title', null);
                    var err = def(res, 'error', undefined);

                    if (typeof err !== "undefined") {
                        addError($form, err);
                        clearInterval(id);
                    } else if (title !== null) {
                        // description link
                        $collapse.find('.share-title').text(title);
                        $collapse.find('.share-description').text(def(res.parameters, 'description', null));

                        clearInterval(id);
                    }
                }
            })

        }, 1500);
    }

    function addError($form, message) {

        $form.find('.form-group')
            .addClass('has-danger')
            .find('input')
            .addClass('form-control-danger');

        $form.find('.form-group .form-control-feedback')
            .text(message);

        $collapse.collapse('hide');

    }

    function reset() {
        $result.val('');
        $collapse.find('.share-title').text('');
        $collapse.find('.share-description').text('');
        $qr.attr('src', 'https://ds.bavix.ru/svg/logo.svg');
        $collapse.collapse('hide');
    }

    $('form.bx-form').submit(function (e) {

        e.preventDefault();

        var $form = $(this);
        var url = $form.find('input[name=url]').val().trim();

        reset();

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: {
                url: url,
                _token: _token
            },
            success: function (res) {

                if (typeof res.error !== "undefined") {
                    addError($form, res.error);
                }
                else {

                    $collapse.collapse('show');

                    $form.find('.form-group')
                        .removeClass('has-danger')
                        .find('input')
                        .removeClass('form-control-danger');

                    $form.find('.form-group .form-control-feedback')
                        .text('');

                    var _url = 'https://' + location.host + '/' + res.hash;
                    var media = 'https://' + location.host + '/qr/' + res.hash;
                    var title = def(res.parameters, 'title', null);
                    var description = def(res.parameters, 'description', null);

                    $qr.attr('src', '/qr/' + res.hash);
                    $result.val(_url);

                    if (title === null) {
                        registerInfo($form, $form.attr('action'), url);

                        $loader = '<div id="loaders">' +
                            '<div class="loader-container mx-auto arc-rotate-double">' +
                                '<div class="loader">' +
                                    '<div class="arc-1"></div>' +
                                    '<div class="arc-2"></div>' +
                                '</div>' +
                            '</div>' +
                        '</div>';

                        $collapse.find('.share-title').html($loader);

                    } else {
                        // description link
                        $collapse.find('.share-title').text(title);
                        $collapse.find('.share-description').text(description);
                    }

                }

            },
            error: function (res) {
                addError($form, typeof res.error !== "undefined" ? res.error : res);
            }
        });

    });

});
