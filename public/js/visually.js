$(function () {

    var $visually = $('.visually');

    $visually.click(function (e) {
         e.preventDefault();
         var $body = $('body');
         $body.toggleClass('visually-impaired');
         bavix.local.set( 'visually',  $body.hasClass('visually-impaired'))
    });

    if (bavix.local.get('visually').toString() === true.toString()) {
        $visually.eq(0).click();
    }

});
