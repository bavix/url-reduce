(function (root, factory) {

    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module unless amdModuleId is set
        define([], function () {
            return (factory());
        });
    }
    else if (typeof exports === 'object') {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like environments that support module.exports,
        // like Node.
        module.exports = factory();
    }
    else {
        factory();
    }

}(this, function () {

    (function ($, window, document, undefined) {

        'use strict';

        var defaults = {
            trash: true
        };

        var Trash = function (element) {

            // get lightGallery core plugin data
            this.core = $(element).data('lightGallery');

            this.$el = $(element);

            // extend module defalut settings with lightGallery core settings
            this.core.s = $.extend({}, defaults, this.core.s);

            this.init();

            return this;
        };

        Trash.prototype.init = function () {
            if (this.core.s.trash) {
                var button = '<span class="lg-trash lg-icon"><i class="fa fa-trash"></i></span>';
                this.core.$outer.find('.lg-toolbar').append(button);
                this.trash();
            }
        };

        Trash.prototype.trash = function () {

            var _this = this;

            this.core.$outer.find('.lg-trash').on('click.lg', function () {

                var $current = _this.core.$items.eq(_this.core.index);

                $.ajax({
                    url: $current.attr('data-trash'),
                    method: 'DELETE',
                    success: function (response) {
                        if (response.result) {
                            $current.remove();
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                        } else {
                            swal(
                                'Deleted!',
                                'Your file has not been deleted.',
                                'error'
                            );
                        }
                    },
                    error: function () {
                        swal(
                            'Deleted!',
                            'Your file has not been deleted.',
                            'error'
                        );
                    }
                });

            });

        };

        Trash.prototype.destroy = function () {
            this.core.$outer.find('.lg-trash').remove();
        };

        $.fn.lightGallery.modules.trash = Trash;

    })(jQuery, window, document);

}));
