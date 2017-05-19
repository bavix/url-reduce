/**
 * @author rez1dent3
 * @web    bavix.ru
 *
 * @returns {bavix}
 */
var bavix = new (function () {

    this.local = new (function () {

        this.localStorageSupport = function () {
            return ('localStorage' in window) && window['localStorage'] !== null;
        };

        this.getRequired = function (key) {

            var value = null;

            if (this.localStorageSupport()) {
                value = localStorage.getItem(key);
            }

            if (value === null) {
                throw new Error();
            }

            return value;

        };

        this.get = function (key, defaultValue) {
            try {
                return this.getRequired(key);
            } catch (e) {
                return defaultValue;
            }
        };

        this.set = function (key, value) {
            if (this.localStorageSupport()) {
                localStorage.setItem(key, value);
            }

            return value;
        };

        return this;

    });

    return this;

});
