/*jshint esversion: 6 */

import get from 'lodash/get';

class Link {
    constructor(data) {
        this.title = get(data, 'parameters.title');
        this.content = get(data, 'parameters.description');
        this.hash = get(data, 'hash');
        this.tags = get(data, 'parameters.tags');
    }
}

export default Link;
