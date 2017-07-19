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

    function token() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    function registerInfo($collapse, api, url) {
        var id = setInterval(function () {

            $.ajax({
                url: api,
                method: 'POST',
                data: {
                    url: url,
                    _token: token()
                },
                success: function (res) {
                    var title = def(res.parameters, 'title', null);

                    if (title !== null) {

                        // description link
                        $collapse.find('.share-title').text(title);
                        $collapse.find('.share-description').text(def(res.parameters, 'description', null));

                        clearInterval(id);
                    }
                }
            })

        }, 1500);
    }

    $('form.bx-form').submit(function (e) {

        e.preventDefault();

        var $collapse = $('#collapse');
        var $qr = $collapse.find('#qr-code');
        var $share = $('#share');
        var $result = $('#result');
        var $form = $(this);
        var url = $form.find('input[name=url]').val().trim();

        $result.val('');
        $collapse.find('.share-title').text('');
        $collapse.find('.share-description').text('');

        $qr.attr('src', 'https://ds.bavix.ru/svg/logo.svg');

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: {
                url: url,
                _token: token()
            },
            success: function (res) {

                if (typeof res.error !== "undefined") {

                    $form.find('.form-group')
                        .addClass('has-danger')
                        .find('input')
                        .addClass('form-control-danger');

                    $form.find('.form-group .form-control-feedback')
                        .text(res.error);

                    $collapse.collapse('hide');

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
                        registerInfo($collapse, $form.attr('action'), url);

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

                    // share link
                    $share.data('url', _url);
                    $share.data('title', title);
                    $share.data('description', description);
                    $share.data('media', media);
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
