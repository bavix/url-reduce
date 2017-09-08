/**
 * @author rez1dent3
 * @year 2017
 * @company bavix
 * @site bavix.ru
 * @site babichev.net
 */
$(function () {

    // report
    var $btnReport = $('.report-btn');

    $btnReport.click(function () {
        $('.bx-modal').css('display', 'flex');

        history.pushState(
            {report: 1},
            '',
            location.origin + location.pathname + '#report'
        )
    });

    $('.bx-modal, .close-bx-modal').click(function (e) {

        if ($(e.target).parents('.bx-modal-content').length > 0 || $(e.target).hasClass('bx-modal-content')) {
            return;
        }

        $('.bx-modal').css('display', 'none');
        // history.back();

        history.pushState(
            {report: 1},
            '',
            location.origin + location.pathname
        )
    });

    function reportEvent() {
        if (location.hash === '#report') {
            $btnReport.click();
        }
    }

    window.addEventListener('hashchange', reportEvent);
    reportEvent();

    $('#form-report').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function (json) {
                if (typeof json.content !== "undefined") {
                    $('.close-bx-modal').click();
                    return swal(
                        json.title,
                        json.content,
                        'success'
                    );
                }

                swal(
                    'Oops...',
                    json.error,
                    'error'
                )
            }
        });
    });

    // /report

    // clipboard
    var clipboard = new Clipboard('button.clipboard');
    var $qr = $('#qr-code');
    var $share = $('#share');
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

    function registerInfo($form, api, url, _url, media) {
        var retry = 10;
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
                        retry = 0;
                    }
                    else if (title !== null) {

                        var description = def(res.parameters, 'description', null);

                        // description link
                        $collapse.find('.share-title').text(title);
                        $collapse.find('.share-description').text(description);
                        shareInfo(title, description, _url, media);
                        retry = 0;
                    }

                    if (--retry <= 0) {
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
        $share.hide();

    }

    function shareInfo(title, description, url, media) {
        addthis.update('share', 'url', url);
        addthis.update('share', 'title', title);
        addthis.update('share', 'description', description);
        addthis.update('share', 'media', media);

        $share.show();
    }

    function reset() {
        $result.val('');
        $collapse.find('.share-title').text('');
        $collapse.find('.share-description').text('');
        $collapse.find('.share-tags').text('');
        $qr.attr('src', 'https://ds.bavix.ru/svg/logo.svg');
        // $collapse.collapse('hide');
        $share.hide();
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
                        registerInfo($form, $form.attr('action'), url, _url, media);

                        $loader = '<div id="loaders">' +
                            '<div class="loader-container mx-auto arc-rotate-double">' +
                            '<div class="loader">' +
                            '<div class="arc-1"></div>' +
                            '<div class="arc-2"></div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $collapse.find('.share-title').html($loader);

                    }
                    else {
                        // description link
                        $collapse.find('.share-title').text(title);
                        $collapse.find('.share-description').text(description);

                        var $tags = $collapse.find('.share-tags');

                        $.each(def(res.parameters, 'tags', []), function (key, tag) {
                            if (key > 10) {
                                return;
                            }

                            $tags.append('<span class="badge badge-light">' + tag + '</span>');
                        });

                        shareInfo(title, description, _url, media);
                    }

                }

            },
            error: function (res) {
                addError($form, typeof res.error !== "undefined" ? res.error : res);
            }
        });

    });

});
