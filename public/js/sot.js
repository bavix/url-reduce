/**
 * @author rez1dent3
 * @year 2017
 * @company bavix
 * @site bavix.ru
 * @site babichev.net
 */
$(function () {

    var $poll = $('#poll');
    var $polls = $poll.data('count');

    $('.lightGallery').lightGallery();

    $poll.find('[type=radio]').change(function () {
        $poll.find('button').prop('disabled', $poll.serializeArray().length !== ($polls + 1));
    });

    // validate form
    $('#personal-data').change(function () {

        var checked = $(this).prop('checked');
        var $fields = $(this).parents('form[method="POST"]').find('[required]');

        $fields.each(function (_, field) {
            var $field = $(field);
            _ = $field.val();
            if (!_ || _.trim().length === 0) {
                checked = false;
                $field.removeClass('form-control-success').addClass('form-control-danger');
                $field.parent('div').removeClass('has-success').addClass('has-danger');
            } else {
                $field.removeClass('form-control-danger').addClass('form-control-success');
                $field.parent('div').removeClass('has-danger').addClass('has-success');
            }
        });

        $(this).prop('checked', checked);
        $('button[data-personal]').prop('disabled', !checked);
    });

    // send form
    $('form[method="POST"]').submit(function (e) {

        var $personal = $('#personal-data');

        if (!$personal.length)
        {
            return true;
        }

        e.preventDefault();

        if ($personal.prop('checked')) {
            $.ajax({
                url: location.href,
                method: 'POST',
                data: $(this).serializeArray(),
                success: function (response) {
                    if (response.result) {
                        swal('Successful', 'Форма отправлена успешно!', 'success')
                    } else {
                        swal('Oops...', 'Произошла ошибка, попробуйте позже!', 'error');
                    }
                },
                error: function () {
                    swal('Oops...', 'Произошла ошибка, попробуйте позже!', 'error');
                }
            })
        }
    });

    var halper = function (variable) {
        return function (e) {
            e.preventDefault();
            var $body = $('body');
            var $a = $(this);

            if ($a.hasClass('active')) {
                return;
            }

            $body.removeClass(variable);
            variable = $a.data('val');
            $body.addClass(variable);
            $a.parent().find('a').removeClass('active');
            $a.addClass('active');
            $.get($a.attr('href'));
        };
    };

    $('.visually-font a').click(new halper(font));
    $('.visually-color a').click(new halper(color));

    $('.visually-special a').click(function (e) {
        e.preventDefault();
        var $body = $('body');
        var $a = $(this);
        $a.parent().find('a').toggleClass('active');
        $body.toggleClass($a.data('val'));
        $.get($a.attr('href'));

        var $sel = $a.data('sel');

        if (typeof $sel !== "undefined") {
            if (!$sel) {
                $body.removeClass('visually-image');

                // reset buttons
                $('.visually-font a').removeClass('active').eq(0).click();
                $('.visually-color a').removeClass('active').eq(0).click();
            }
        }
    });

});
